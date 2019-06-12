<?php

namespace App\Http\Controllers\Horarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Traits\RegistrarFuncionario;


class ManterHorariosControler extends Controller{

    public function __construct(){
        $this->middleare('auth');
        $this->middleware('funcionario');
    }

    public function carregaDatas(Request $request){
        echo "buscando a data $request->ano/$request->semana";
    }

}