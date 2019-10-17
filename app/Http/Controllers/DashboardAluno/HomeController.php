<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\BuscarAluno;

class HomeController extends Controller
{
    use BuscarAluno;

    public function __construct(){
        $this->middleware('aluno');
    }

    public function home(){
        return view('aluno.home');
    }

    public function mostrarPaginaMarcarAtendimento(){
        return view('aluno.marcarAtendimento');
    }

    public function mostrarPaginaGerenciarPerfil(){
        return view('aluno.gerenciarPerfil',['base_url' => config('app.url')]);
    }

    public function getAluno(Request $request,$id){
        return response($this->BuscarInfo($id),200)->header('Content-Type','text/json');
    }

}
