<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashidds\Hashids;
use App\Models\curso\Curso;

class CursoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   

    }

    public function createCurso(Request $request){

       
        $this->validate($request, [
            'nome' => 'required|max:31'
        ]);

        $curso = Curso::create($request);


        return response()->json($curso);

    }

    public function alterCurso(Request $request){
        try{
            $this->validate($request, [
                'value' => 'required|max:31',
                'id'    => 'required|exists:curso,id'
            ]);
            $curso = Curso::find($request->id);
            $curso->nome = $request->value;
            $curso->save();
            return response()->json([
                'sucesso' => true
            ], 200);
        }catch(\Exception $e){
            echo $e;
        }
    }

    public function mostrarPaginaCursos(){
        return view('auth.pages.cursos.cursos', ['cursos' => Curso::all(), 'base_url' => config('app.url')]);
    }

    //services
    public function getCursos(){
        return response()->json(Curso::all());
    }
}
