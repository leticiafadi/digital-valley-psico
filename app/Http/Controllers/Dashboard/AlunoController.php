<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashidds\Hashids;
use App\Models\aluno\Aluno;
use App\Models\aluno\ObservacaoAluno;
use App\Models\curso\Curso;
use App\Http\Controllers\Traits\BuscarAluno;

class AlunoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   

    }

    use BuscarAluno;

    public function mostrarPaginaAlunos(){
        return view('auth.pages.alunos.alunos', ['cursos' => Curso::all(), 'base_url' => config('app.url')]);
    }

    //services, refatorar 
    public function getAlunos(Request $request){
        $query = $request->get('query');
        $page = $request->get('page');
        $id_curso = $request->get('id_curso');
        if($id_curso == null){
            return response((Aluno::buscaAlunos($query,$page)),200)->header('Content-Type','text/json');
        }else {
            return response((Aluno::buscaAlunosCurso($query,$page,$id_curso)),200)->header('Content-Type','text/json');
        }
        
    }

    
    public function getAluno(Request $request,$id){
        return response($this->Buscar($id),200)->header('Content-Type','text/json');
    }

    public function mostrarPerfilAluno(Request $request,$id){
        return view('auth.pages.alunos.informacoes', ['base_url' => config('app.url'), 'idaluno' => $id]);
    }

    public function addObsercacaoAluno(Request $request, int $id){


        $obs = ObservacaoAluno::create([
            'comentario'    => $request->observacao,
            'id_aluno'      => $id
        ]);

        return response($obs,201)->header('Content-Type','text/json');
    }


}
