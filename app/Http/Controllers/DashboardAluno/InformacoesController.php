<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\aluno\Aluno;
use \App\Models\semestre\Semestre;
use App\Models\aluno\InformacoesAluno;
use Illuminate\Support\Facades\Auth;

class InformacoesController extends Controller
{

    public function __construct(){
        $this->middleware('aluno');
    }

    public function manterInformacoesSemestre()
    {
        return view("aluno.manter-informacoes-semestre");
    }

    public function atualizarInfoSemestre(Request $request)
    {

        $aluno = Aluno::where('id_usuario', Auth::user()->id)->firstOrFail();

        $semestre = Semestre::orderBy('id', 'desc')->firstOrFail();

        $info = InformacoesAluno::create([
            'id_aluno'          => $aluno->id,
            'id_semestre'       => $semestre->id,
            'estado_civil'      => $request->estado_civil,
            'reside_com'        => $request->reside_com,
            'reside_outros'     => $request->reside_outros,
            'formacao_escolar'  => $request->formacao_escolar,
            'turno'             => $request->turno,
            'semestre_atual'    => $request->semestre_atual,
            'forma_ingresso'    => $request->forma_ingresso,
            'tipo_cotas'        => $request->tipo_cotas,
            'cursos_concluidos' => $request->cursos_concluidos,
            'cursos_andamento'  => $request->cursos_andamento,
            'possui_auxilio'    => $request->possui_auxilio,
            'tipo_auxilio'      => $request->tipo_auxilio,
            'possui_bolsa'      => $request->possui_bolsa,
            'tipo_bolsa'        => $request->tipo_bolsa,
            'possui_filhos'     => $request->possui_filhos
        ]);
        return response()->json($info, 201);
    }

}
