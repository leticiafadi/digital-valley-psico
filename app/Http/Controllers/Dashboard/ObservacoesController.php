<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\atendimento\Atendimento;
use App\Models\funcionario\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\observacao\ObservacaoAtendimento;
use Illuminate\Support\Facades\Auth;

class ObservacoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('funcionario');
    }

    public function apagarObservacaoAtendimento(Request $request){
        $observacao = ObservacaoAtendimento::find($request->id);

        //Verificar se existe observações para esse atendimento
        if ($observacao == null)
        {
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'Não há observações para esse atendimento!',
            ], 404);
        }

        //Verificar se a observação pertece ao atendimento do psicologo logado
        $psicoLogado = Funcionario::where('id_usuario', Auth::id())->first();
        $responsavel = Atendimento::find($observacao->id_atendimento)->first();

        if ($responsavel->id_psicologo != $psicoLogado->id)
        {
            return response()->json([
                'sucesso' => false,
                'code' => 403,
                'msg' => 'Você não pode apagar esta observação!',
            ], 403);
        }

        //Apagar a observacao
        $observacao->delete();
        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Observação apagada com sucesso!'
        ], 200);
    }
}