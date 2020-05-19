<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\atendimento\Atendimento;

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
        // var_dump($request);
        $atendimento = [
            'id_aluno'       => Auth::user()->aluno()->id,
            'id_horario'     => $request->get('id_horario'),
            'id_psicologo'   => $request->get('id_psicologo'),
            'status'         => 'não_ocorrido',
            'motivo'         => $request->get('motivo'),
            'encaminhamento' => $request->get('encaminhamento')
        ];

        $confirmacao = Atendimento::create($atendimento);

        return response($confirmacao, 200)->header('Content-Type', 'text/json');
    }

    // public function mostrarAtendimento($id)
    // {
    //     return response(Atendimento::select('id', 'id_aluno', 'id_horario', 'status')->where('id_aluno', '=', $id)->get(), 200)->header('Content-Type', 'text/json');
    // }
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
        $atendimento = Atendimento::select('atendimento.id', "usuario.nome_completo as psicologo", 'atendimento.motivo', 'horario_semana.dia', 'horario_semana.horario')->join('funcionario', 'atendimento.id_psicologo', '=', 'funcionario.id')->join('usuario', 'funcionario.id_usuario', '=', 'usuario.id')->join('horario_semana', 'atendimento.id_horario', '=', 'horario_semana.id')->where('id_aluno', '=', Auth::user()->aluno()->id)->get();
        foreach ($atendimento as $atend)
            $atend->horario = $horarios[$atend->horario];
        return response($atendimento, 200)->header('Content-Type', 'text/json');
    }
}
