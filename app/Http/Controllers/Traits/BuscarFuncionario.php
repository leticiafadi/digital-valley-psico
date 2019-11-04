<?php

namespace App\Http\Controllers\Traits;

use App\Models\funcionario\Funcionario;
use App\Models\usuarios\Usuario;
use App\Models\horarios\HorarioSemana;
use App\Models\horarios\Semana;

trait BuscarFuncionario{

    private function listarPsicologos(){
        return Usuario::join('Funcionario','usuario.id','=','funcionario.id_usuario')->get();
    }

    private function horarioPsicologo($id){
        //$semana = Semana::where('id_funcionario','=',$id)->get();
        //dd($Semana);
        $horario = Semana::where('id_funcionario','=',$id)->join('Horario_Semana','Semana.id','=','Horario_Semana.id_semana')->get();
        /*$horario1=  HorarioSemana::join('Semana',function ($join){
            $join->on('HorarioSemana.id_semana','=','Semana.id')->where('Semana.id_funcionario','=',$id);
        })->get();
        */
        return $horario;
    }

}