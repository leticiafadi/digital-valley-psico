<?php

namespace App\Http\Controllers\Traits;

use App\Models\funcionario\Funcionario;
use App\Models\usuarios\Usuario;
use App\Models\horarios\HorarioSemana;
use App\Models\horarios\Semana;

trait BuscarFuncionario{

    private function listarPsicologos(){
        return Usuario::join('funcionario','usuario.id','=','funcionario.id_usuario')->get();
    }

    private function horarioPsicologo($id,$semana){
        return Semana::where('id_funcionario','=',$id)->where('semana.numero_semana','=',$semana)->first()->horarios();
    }

}