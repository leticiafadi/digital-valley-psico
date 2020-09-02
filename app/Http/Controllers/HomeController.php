<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curso\Curso;
use App\Models\funcionario\Funcionario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('funcionario');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.pages.home');
    }
}
