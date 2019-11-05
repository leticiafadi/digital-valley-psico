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
        $semana = date("y-m-d");
        $date = explode("-", $semana);
        $date  = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
        $semana  = (int)date('W', $date);
        $horario = Semana::select('Semana.id','Horario_Semana.id','Horario_Semana.dia','Horario_Semana.horario')->where('id_funcionario','=',$id)->where('Semana.numero_semana','>=',$semana)->join('Horario_Semana','Semana.id','=','Horario_Semana.id_semana')->get();
        return $horario;
    }

}