<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function home(){
        return view('aluno.home');
    }
}
