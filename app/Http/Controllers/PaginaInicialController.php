<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\curso\Curso;

class PaginaInicialController extends Controller
{
    public function __construct(){
		$this->middleware('guest');
	}
	
	public function mostrarPaginaInicial(){
		return view('guest.pages.pagina-inicial.pagina-inicial', ['cursos' => Curso::all()]);
	}

}
