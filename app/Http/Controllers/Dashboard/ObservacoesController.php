<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\observacao\ObservacoesAluno;
use App\Models\observacao\ObservacaoAtendimento;

class ObservacoesController extends Controller
{
    public static function salvarObservacaoAluno(Request $request){

        this.validate($request,[
            'id_aluno' => 'require|exists:aluno,id' 
        ]);

        $observacao = [
            'id_aluno' => $request->get('id_aluno'),
            'comentario'     => $request->get('comentario')
        ];

        return ObservacoesAluno::create($observacao);
    }

    public static function salvarObservacaoAtendimento(Request $request){

        this.validate($request,[
            'id_atendimento' => 'require|exists:atendimento,id' 
        ]);

        $observacao = [
            'id_atendimento' => $request->get('id_atendimento'),
            'observacao'     => $request->get('observacao')
        ];

        return ObservacaoAtendimento::create($observacao);
    }


    public static function mostrarObservacaoAtendimento(Request $reques,$id){
        return response(ObservacaoAtendimento::where('id_atendimento','=',$id)->get(),200)->header('Content-Type','text/json');
    }

    public static function mostrarObservacaoAluno(Request $request,$id){
        return response(ObservacoesAluno::where('id_aluno','=',$id)->get(),200)->header('Content-Type','text/json');
    }

}