<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashidds\Hashids;
use App\Models\aluno\Aluno;
use App\Models\curso\Curso;

class AlunoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   

    }

    //atualizar a rota da view dos alunos
    public function mostrarPaginaAlunos(){
        return view('auth.pages.alunos.alunos', ['cursos' => Curso::all(), 'base_url' => config('app.url')]);
    }

    //services
    public function getAlunos(Request $request){
        $query = $request->get('query');
        $page = $request->get('page');
        return json_encode(Aluno::buscaAlunos($query,$page));
    }

}
