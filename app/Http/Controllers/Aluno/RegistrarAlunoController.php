<?php

namespace App\Http\Controllers\Aluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\RegistrarAlunoRequest;
use App\Http\Controllers\Traits\RegistrarAluno;

class RegistrarAlunoController extends Controller{

    
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    use RegistrarAluno;

    public function registrarAluno(RegistrarAlunoRequest $request){
        $this->registra($request);

        return redirect('/')->with('success', 'Cadastro do aluno feito com sucesso !!');
    }
}
