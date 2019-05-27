<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\funcionario\Funcionario;
use App\Models\localizacao\Pais;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('funcionario');   
    }

    public function usuarios(){
        return view('auth.pages.usuarios')->with('funcionarios', Funcionario::all());
    }
	
	public function formularioCriarUsuarios(){
		return view('auth.pages.registrar-funcionario.registrar-funcionario', ['paises' => Pais::all(), 'base_url' => config('app.url') ]);
	}

}
