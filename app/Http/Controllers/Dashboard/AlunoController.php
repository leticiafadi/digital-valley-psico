<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\usuarios\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\aluno\Aluno;
use App\Models\aluno\ObservacaoAluno;
use App\Models\curso\Curso;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('funcionario');
    }

    public function mostrarPaginaAlunos()
    {
        return view('auth.pages.alunos.alunos', ['cursos' => Curso::all(), 'base_url' => config('app.url')]);
    }

    public function listarAlunos()
    {
        $alunos = Aluno::join('usuario', 'aluno.id_usuario', '=', 'usuario.id')
            ->join('curso', 'aluno.id_curso', '=', 'curso.id')
            ->select('aluno.id as id_aluno', 'usuario.id as id_usuario', 'usuario.nome_completo', 'aluno.matricula', 'curso.nome as curso')
            ->get();

        return response()->json($alunos);
    }

    public function getAluno(Request $request, $id)
    {
        $alunoInfo = Usuario::where('usuario.id', $id)
            ->with(['aluno' => function ($query) {
                $query->select('id_usuario', 'id_curso', 'matricula', 'semestre_matricula');
            }, 'aluno.curso' => function ($query) {
                $query->select('id', 'nome');
            }, 'endereco' => function ($query) {
                $query->select('id', 'id_cidade', 'endereco as rua', 'numero', 'bairro');
            }, 'endereco.cidade' => function ($query) {
                $query->select('id', 'state_id', 'name as nome');
            }, 'endereco.cidade.estado' => function ($query) {
                $query->select('id', 'country_id', 'name as nome');
            }, 'endereco.cidade.estado.pais' => function ($query) {
                $query->select('id', 'name as nome');
            }, 'contatos' => function ($query) {
                $query->select('id_usuario', 'contato');
            }])->get();

        return response()->json($alunoInfo->toArray());
    }

    public function mostrarPerfilAluno(Request $request, $id)
    {
        return view('auth.pages.alunos.informacoes', ['base_url' => config('app.url'), 'idaluno' => $id]);
    }

    public function addObsercacaoAluno(Request $request, int $id)
    {
        $obs = ObservacaoAluno::create([
            'comentario' => $request->observacao,
            'id_aluno' => $id
        ]);

        return response()->json($obs, 201);
    }
}
