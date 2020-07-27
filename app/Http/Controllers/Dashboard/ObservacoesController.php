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

    public function apagarObservacaoAtendimento(Request $request)
    {
        $observacao = ObservacaoAtendimento::find($request->id);

        //Verificar se existe observações para esse atendimento
        if ($observacao == null) {
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'Não há observações para esse atendimento!',
            ], 404);
        }

        //Verificar se a observação pertece ao atendimento do psicologo logado
        $psicoLogado = Funcionario::where('id_usuario', Auth::id())->first();
        $responsavel = Atendimento::find($observacao->id_atendimento)->first();

        if ($responsavel->id_psicologo != $psicoLogado->id) {
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

    public function adicionarObservacao(Request $request)
    {
        /*
         *  VALIDAR A OBSERVAÇÃO
         */
        $validacao = \Validator::make($request->input(), [
            'observacao' => 'required|min:5',
        ], [
            'required' => 'O campo observação é obrigatório!',
            'min' => 'O campo observação deve ter no mínimo 5 caracteres!'
        ]);

        if ($validacao->fails()) {
            return response()->json([
                'sucesso' => false,
                'code' => 400,
                'msg' => '',
                'errors' => $validacao->errors()
            ], 400);
        }

        /*
         * VALIDAR O FUNCIONÁRIO QUE ESTÁ ENVIANDO A REQUISIÇÃO
         */

        $responsavelAtendimento = Atendimento::select(['id', 'id_psicologo'])
            ->where('id', '=', $request->input('id_atendimento'))
            ->get()
            ->toArray();

        if(@$responsavelAtendimento[0]['id_psicologo'] != Auth::id()){
            return response()
                ->json([], 401);
        }

        $novaObservacao = ObservacaoAtendimento::create($request->input());

        return response()->json([
            'sucesso' => true,
            'code' => 201,
            'msg' => 'Observação criada com sucesso!',
            'data' => $novaObservacao
        ], 201);
    }

    public function mostrarObservacoesAtendimento(Request $request)
    {
        $listaObservacoes = ObservacaoAtendimento::where('id_atendimento', '=', $request->id)
            ->orderByDesc('created_at')
            ->get();

        if ($listaObservacoes->isEmpty())
        {
            return response()
                ->json([], 404);
        }

        return response()->json($listaObservacoes, 200);
    }
}