<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Models\localizacao\Pais;
use App\Models\localizacao\Estado;

class LocalizacaoController extends Controller
{
    public function __construct(){

    }

    public function pais(){
        return response()->json(Pais::all(), 200);
    }

    public function estados($idPais){
        return response()->json(Pais::find($idPais)->estados);
    }

    public function cidades($idEstado){
        return response()->json(Estado::find($idEstado)->cidades);
    }

}
