<?php

namespace App\Http\Controllers\DashboardAluno;

use App\Models\aluno\Aluno;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\atendimento\Atendimento;
use App\Models\funcionario\Funcionario;
use App\Mail\SendMailPsicologo;

class AtendimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('aluno');
    }

    public function salvarAtendimento(Request $request)
    {

        $this->validate($request, [
            'id_horario' => 'required|exists:horario_semana,id'
        ]);
        $atendimento = [
            'id_aluno'       => Auth::user()->aluno->id,
            'id_horario'     => $request->get('id_horario'),
            'id_psicologo'   => $request->get('id_psicologo'),
            'status'         => 'nao_ocorrido',
            'motivo'         => $request->get('motivo'),
            'encaminhamento' => $request->get('encaminhamento')
        ];

        $confirmacao = Atendimento::create($atendimento);
        #controller
        // $user = Funcionario::where('id', $request->get('id_psicologo'))->join("usuario", 'funcionario.id_usuario', 'usuario.id')->join("users", 'usuario.id', 'users')->first();
        // var_dump($)
        // Mail::to("guikar741lol@gmail.com")->send(new SendMailPsicologo($atendimento));
        // Mail::to($user->email)->send(new SendMailPsicologo($atendimento));

        return response($confirmacao, 200)->header('Content-Type', 'text/json');
    }

    public function mostrarAtendimentos()
    {
        $horarios = [
            'a' => "08:00 as 09:00",
            'b' => "09:00 as 10:00",
            'c' => "10:00 as 11:00",
            'd' => "11:00 as 12:00",
            'e' => "13:00 as 14:00",
            'f' => "14:00 as 15:00",
            'g' => "15:00 as 16:00",
            'h' => "16:00 as 17:00",
            'i' => "17:00 as 18:00",
            'j' => "18:00 as 19:00",
        ];
        $atendimento = Atendimento::select('atendimento.id', "usuario.nome_completo as psicologo", 'atendimento.motivo', 'horario_semana.dia', 'horario_semana.horario', 'atendimento.status')->join('funcionario', 'atendimento.id_psicologo', '=', 'funcionario.id')->join('usuario', 'funcionario.id_usuario', '=', 'usuario.id')->join('horario_semana', 'atendimento.id_horario', '=', 'horario_semana.id')->where('id_aluno', '=', Auth::user()->aluno->id)->get();
        foreach ($atendimento as $atend)
            $atend->horario = $horarios[$atend->horario];
        return response($atendimento, 200)->header('Content-Type', 'text/json');
    }

    public function cancelarAtendimento(Request $request)
    {
        $atendimento = Atendimento::find($request->atid);
        $aluno = Aluno::select('*')->where('id_usuario', Auth::id())->get();

        if(($atendimento == null) OR ($atendimento->id_aluno != $aluno[0]->id))
        {
            //Atendimento não existe ou não pertece a esse aluno
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'O atendimento selecionado não existe!',
            ], 404);
        }

        if ($atendimento->status == 'ocorrido' OR $atendimento->status == 'cancelado')
        {
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

    public function mostrarDetalhes($id)
    {
        $aluno = Aluno::select('*')->where('id_usuario', Auth::id())->get();
        $atendimento = Atendimento::where('id', $id)
            ->where('id_aluno', $aluno[0]->id)
            ->with('aluno.usuario')
            ->with('observacoes')
            ->get();

        if ($atendimento->isEmpty())
        {
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'Esse atendimento não foi encontrado!',
            ], 404);
        }

        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Atendimento encontrado com sucesso!',
            'detalhes' => [
                'nome_aluno' => $atendimento[0]->aluno->usuario->nome_completo,
                'matricula' => $atendimento[0]->aluno->matricula,
                'encaminhamento' => $atendimento[0]->encaminhamento,
                'observacoes' => $atendimento[0]->observacoes
            ]
        ], 200);
    }
}
