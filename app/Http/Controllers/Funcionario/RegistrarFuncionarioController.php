<?php

namespace App\Http\Controllers\Funcionario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrarFuncionarioRequest;


use App\Http\Controllers\Traits\RegistrarFuncionario;


class RegistrarFuncionarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    use RegistrarFuncionario;

    public function registrarFuncionario(RegistrarFuncionarioRequest $request){

        $this->registra($request);
        return redirect('/users')->with('success', 'Cadastro do funcionário feito com sucesso !!');
    }

}
