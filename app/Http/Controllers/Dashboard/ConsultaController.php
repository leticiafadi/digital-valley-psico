<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Models\atendimento\Atendimento;
use App\Serializers\JsonDataSerializer;

use App\Models\aluno\Aluno;
use App\Models\horarios\HorarioSemana;
use App\Mail\SendMailAluno;

use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Collection as FractalCollection;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('funcionario');
    }

    public function mostarPaginaConsultas()
    {
        return view('auth.pages.calendario', ['base_url' => config('app.url')]);
    }

    public function listarAtendimentos()
    {
        $atendimentos = Atendimento::select("atendimento.id", "usuario.nome_completo as nome", "aluno.matricula", 'horario_semana.horario', 'horario_semana.dia', 'atendimento.status', 'atendimento.encaminhamento', 'atendimento.motivo')->
        where("id_psicologo", Auth::user()->id)
            ->join("horario_semana", 'atendimento.id_horario', '=', 'horario_semana.id')
            ->join('aluno', 'atendimento.id_aluno', '=', 'aluno.id')
            ->join('usuario', 'aluno.id_usuario', '=', 'usuario.id')
            ->get();

        $horarios = [
            'a' => ["08:00", "09:00"],
            'b' => ["09:00", "10:00"],
            'c' => ["10:00", "11:00"],
            'd' => ["11:00", "12:00"],
            'e' => ["13:00", "14:00"],
            'f' => ["14:00", "15:00"],
            'g' => ["15:00", "16:00"],
            'h' => ["16:00", "17:00"],
            'i' => ["17:00", "18:00"],
            'j' => ["18:00", "19:00"],
        ];

        $fractalManager = new FractalManager();
        $fractalManager->setSerializer(new JsonDataSerializer);

        $resource = new FractalCollection($atendimentos->toArray(), function ($atendimento) use ($horarios) {
            return [
                'id_atendimento' => $atendimento['id'],
                'title' => $atendimento['nome'],
                'matricula' => $atendimento['matricula'],
                'encaminhamento' => $atendimento['encaminhamento'],
                'motivo' => $atendimento['motivo'],
                'start' => "{$atendimento['dia']} {$horarios[$atendimento['horario']][0]}",
                'end' => "{$atendimento['dia']} {$horarios[$atendimento['horario']][1]}",
                'status' => $atendimento['status'],
                'color' => ($atendimento['status'] == 'cancelado') ? '#dc3545' : (($atendimento['status'] == 'ocorrido') ? '#28a745' : '#6c757d'),
            ];
        });

        $atendimentos = $fractalManager->createData($resource)->toArray();
        return response()->json($atendimentos);
    }

    public function listarAtendimentosAluno(Request $request)
    {
        $horarios = [
            'a' => "08:00 às 09:00",
            'b' => "09:00 às 10:00",
            'c' => "10:00 às 11:00",
            'd' => "11:00 às 12:00",
            'e' => "13:00 às 14:00",
            'f' => "14:00 às 15:00",
            'g' => "15:00 às 16:00",
            'h' => "16:00 às 17:00",
            'i' => "17:00 às 18:00",
            'j' => "18:00 às 19:00",
        ];
        $atendimento = Atendimento::select('atendimento.id', "usuario.nome_completo as psicologo", 'atendimento.motivo', 'horario_semana.dia', 'horario_semana.horario', 'atendimento.status')
        ->join('funcionario', 'atendimento.id_psicologo', '=', 'funcionario.id')
        ->join('usuario', 'funcionario.id_usuario', '=', 'usuario.id')
        ->join('horario_semana', 'atendimento.id_horario', '=', 'horario_semana.id')
        ->where('id_aluno', '=', 13)->get();

        foreach ($atendimento as $atend)
            $atend->horario = $horarios[$atend->horario];
        return response()->json($atendimento, 200);
    }

    public function verConsulta($id = 1)
    {
        try {
            return view('auth.pages.item-consulta.item-consulta')->with('consulta');
        } catch (\Exception $e) {
            return $this->redirect()->back();
        }

    }

    public function atualizarStatusAtendimento(Request $request)
    {
        $atendimento = Atendimento::find($request->input('id_atendimento'));
        $status = $request->input('status');
        $psicologoId = Auth::id();

        if (($atendimento == null) or ($atendimento->id_psicologo != $psicologoId)) {
            //Atendimento não existe ou não pertece a esse psicologo
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'O atendimento selecionado não existe!',
            ], 404);
        }

        //Verificar se o status passado é válido de acordo com uma lista de status pré-definidas
        if (empty($status) OR !in_array($status, ['nao_ocorrido', 'ocorrido', 'cancelado']))
        {
            return response()->json([
                'sucesso' => false,
                'code' => 401,
                'msg' => 'O status selecionado é inválido!',
            ], 401);
        }

        //Atualizar o status do atendimento
        $atendimento->status = $status;
        $atendimento->save();

        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Situação alterada com sucesso!',
        ], 200);
    }

    public function editarAtendimento(Request $request, $id)
    {
        $atendimento = Atendimento::find($id);
        $atendimento->aluno->toArray();
        $atendimento->horario->toArray();
        return view('auth.pages.editar-atendimento.EditarAtendimento', ['atendimento' => $atendimento]);
    }

    public function attAtendimento(Request $request, $id)
    {
        $this->validate($request, [
            'id_horario' => 'required|exists:horario_semana,id'
        ]);
        $atendimento = Atendimento::find($id);
        $atendimento->id_horario = $request->id_horario;
        $atendimento->save();

        $user = Aluno::find($atendimento->id_aluno)->usuario;
        foreach ($user->contatos as $cont) {
            if ($cont->tipo == 'email') {
                $atendimento['nome_psicologo'] = Auth::user()->nome_completo;
                $atendimento['nome_aluno'] = $user->nome_completo;
                $horario = HorarioSemana::find($request->get('id_horario'));
                $atendimento['dia'] = $horario->dia;
                $atendimento['hora'] = $horario->horario;
                Mail::to($cont->contato)->send(new SendMailAluno($atendimento));
            }
        }

        return response()->json($atendimento, 200);
    }
}
