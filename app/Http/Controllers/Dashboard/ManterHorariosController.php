<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManterHorariosController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   
    }

    public function mostrarPaginaManterHorarios(){
        return view('auth.pages.manter-horarios.manter-horarios');
    }

}
