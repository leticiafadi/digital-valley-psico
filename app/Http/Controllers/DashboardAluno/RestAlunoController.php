<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\usuarios\Usuario;
use App\Http\Controllers\Traits\BuscarFuncionario;

class RestAlunoController extends Controller
{
    use BuscarFuncionario;

    public function getAluno($id){
        $aluno = Usuario::where('usuario.id', $id)
        ->with(['aluno' => function ($query) {
            $query->select('id_usuario', 'id_curso', 'matricula', 'semestre_matricula');
        }, 'aluno.curso' => function ($query) {
            $query->select('id', 'nome');
        }, 'endereco' => function ($query) {
            $query->select('id', 'id_cidade', 'endereco as rua', 'numero', 'bairro');
        }, 'endereco.cidade' => function ($query) {
            $query->select('id', 'state_id', 'name as nome');
        }, 'endereco.cidade.estado' => function ($query) {
            $query->select('id', 'country_id', 'name as nome');
        }, 'endereco.cidade.estado.pais' => function ($query) {
            $query->select('id', 'name as nome');
        }, 'contatos' => function ($query) {
            $query->select('id_usuario', 'contato', 'tipo');
        }])->get()->toArray()[0];
        $contatos = [];
        foreach ($aluno['contatos'] as $c)
            $contatos[$c['tipo']] = $c['contato'];
        $aluno['contatos'] = $contatos;
        return response()->json($aluno);
    }
    
    public function psicologos(){
        return response()->json($this->listarPsicologos(), 200);
    }

    public function horariopsico(Request $request){
        $id = $request->get('id');
        $semana = $request->get('query');
        return response()->json($this->horarioPsicologo($id, $semana), 200);
    }

}