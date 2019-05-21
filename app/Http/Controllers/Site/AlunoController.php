<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\curso\Curso;

class AlunoController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except('logout');
    }

    public function mostrarFormularioCadastrarAluno(Request $request){
        return view('guest.pages.cadastrar-aluno',['cursos' => Curso::all()] );   
    }
}
