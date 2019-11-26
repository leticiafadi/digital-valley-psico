<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\semestre\Semestre;



class ManterSemestreController extends Controller
{
    public function __construct()
    {
		$this->middleware('funcionario');   
    }

    public function mostrarPaginaSemestre(Request $request) {
        return view('auth.pages.manter-semestre.manter-semestre');
    }

    public function index(Request $request)
    {
      return response(["semestres" => Semestre::all()], 200)->header('Content-Type','text/json');
    }
}