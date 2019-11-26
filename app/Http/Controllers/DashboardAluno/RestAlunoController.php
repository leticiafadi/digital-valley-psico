<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\BuscarAluno;
use App\Models\funcionario\Funcionario;
use App\Http\Controllers\Traits\BuscarFuncionario;

class RestAlunoController extends Controller
{
    use BuscarAluno;
    use BuscarFuncionario;

    public function getAluno(Request $request,$id){
        return response($this->BuscarInfo($id),200)->header('Content-Type','text/json');
    }
    
    public function psicologos(){
        return response($this->listarPsicologos(),200)->header('Content-Type','text/json');
    }

    public function horariopsico(Request $request){
        $id = $request->get('id');
        $semana = $request->get('query');
        return response($this->horarioPsicologo($id,$semana),200)->header('Content-Type','text/json');
    }

}