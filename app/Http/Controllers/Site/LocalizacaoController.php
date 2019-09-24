<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\localizacao\Pais;
use App\Models\localizacao\Estado;
use App\Models\localizacao\Cidade;

class LocalizacaoController extends Controller
{
    public function __construct(){

    }

    public function pais(){
        return response(Pais::all(), 200)->header('Content-Type', 'text/json');
    }

    public function estados($idPais){
        echo json_encode(Pais::find($idPais)->estados);
    }

    public function cidades($idEstado){
        echo json_encode(Estado::find($idEstado)->cidades);
    }

}
