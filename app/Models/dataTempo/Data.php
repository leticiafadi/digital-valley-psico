<?php

namespace App\Models\dataTempo;

use Illuminate\Database\Eloquent\Model;

class Data {
    public static function formataDataBrasileiroParaAmericano($data){
        $partes = explode("/", $data);
        return $partes[2].'-'.$partes[1].'-'.$partes[0];
    }

    public static function formatoDataAmericanoParaBrasileiro($data){
        $partes = explode("-", $data);
        return $partes[2].'/'.$partes[1].'/'.$partes[0];
    }

    public static function primeiraSegundaFeiraSemana($ano,$semana){
        $dia = date('Y-m-d', strtotime($ano.'-01-01'));

        if(date('w',strtotime($ano.'-01-01'))==0){
            $dia = date('Y-m-d', strtotime($dia. '+1 day'));
        }else{
            $dia = date('Y-m-d', strtotime($dia. '-'. (date('w', strtotime($dia)) -1 ) .' day'));
        }

        $dia = date('Y-m-d', strtotime($dia. '+'. ($semana-1) .' weeks'));

        return $dia;
    }
}
