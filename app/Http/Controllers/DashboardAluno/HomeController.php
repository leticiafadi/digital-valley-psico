<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('aluno');
        $this->middleware('infoSemestre');
    }

    public function home()
    {
        return view('aluno.home');
    }

    public function mostrarPaginaMarcarAtendimento()
    {
        return view('aluno.marcarAtendimento');
    }

    public function mostrarPaginaGerenciarPerfil()
    {
        return view('aluno.gerenciarPerfil',['base_url' => config('app.url')]);
    }

    public function getAluno(Request $request, $id)
    {
        return response($this->BuscarInfo($id),200)->header('Content-Type','text/json');
    }

    public function manterInformacoesSemestre()
    {
        return view("aluno.manter-informacoes-semestre");
    }

    public function psicologos(){
        return response($this->listarPsicologos(),200)->header('Content-Type','text/json');
    }

    public function horariopsico(Request $request){
        $id = $request->get('id');
        $semana = $request->get('query');
        return response($this->horarioPsicologo($id,$semana),200)->header('Content-Type','text/json');
    }
}
