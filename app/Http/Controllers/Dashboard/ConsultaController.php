<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\atendimento\Atendimento;
use App\Serializers\JsonDataSerializer;
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
        return view('auth.pages.calendario');
    }

    public function listarAtendimentos()
    {
        $atendimentos = Atendimento::select("atendimento.id", "usuario.nome_completo as nome", "aluno.matricula", 'horario_semana.horario', 'horario_semana.dia', 'atendimento.status', 'atendimento.motivo')->
        where("id_psicologo", Auth::user()->id)
            ->join("horario_semana", 'atendimento.id_horario', '=', 'horario_semana.id')
            ->join('aluno', 'atendimento.id_aluno', '=', 'aluno.id')
            ->join('usuario', 'aluno.id_usuario', '=', 'usuario.id')
            ->with('observacoes')
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
                'encaminhamento' => $atendimento['motivo'],
                'start' => "{$atendimento['dia']} {$horarios[$atendimento['horario']][0]}",
                'end' => "{$atendimento['dia']} {$horarios[$atendimento['horario']][1]}",
                'color' => ($atendimento['status'] == 'cancelado') ? '#dc3545' : (($atendimento['status'] == 'ocorrido') ? '#28a745' : '#6c757d'),
                'observacoes' => $atendimento['observacoes']
            ];
        });

        $atendimentos = $fractalManager->createData($resource)->toArray();
        return response()->json($atendimentos);
    }

    public function verConsulta($id = 1)
    {

        try {
            return view('auth.pages.item-consulta.item-consulta')->with('consulta');
        } catch (\Exception $e) {
            return $this->redirect()->back();
        }

    }

    public function cancelarConsulta(Request $request)
    {
        $atendimento = Atendimento::find($request->atid);
        $psicologoId = Auth::id();

        if (($atendimento == null) or ($atendimento->id_psicologo != $psicologoId)) {
            //Atendimento não existe ou não pertece a esse psicologo
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'O atendimento selecionado não existe!',
            ], 404);
        }

        if ($atendimento->status == 'ocorrido' or $atendimento->status == 'cancelado') {
            //Atendimento já ocorrido, não pode ser cancelado
            return response()->json([
                'sucesso' => false,
                'code' => 403,
                'msg' => 'Este atendimento não pode ser cancelado!',
            ], 403);
        }

        //Cancelar o atendimento
        $atendimento->status = 'cancelado';
        $atendimento->save();

        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Atendimento cancelado com sucesso!',
        ], 200);
    }
}
