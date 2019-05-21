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

    
}
