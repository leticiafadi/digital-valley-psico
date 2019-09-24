<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('aluno');
    }

    public function home(){
        return view('aluno.home');
    }

    public function mostrarPaginaMarcarAtendimento(){
        return view('aluno.marcarAtendimento');
    }

}
