<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\observacao\ObservacoesAluno;
use App\Models\usuarios\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\aluno\Aluno;
use App\Models\curso\Curso;
use App\Models\endereco\Endereco;
use Illuminate\Support\Facades\Validator;
use App\Models\dataTempo\Data;
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
                $query->select('id', 'id_usuario', 'id_curso', 'matricula', 'semestre_matricula');
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
                $query->select('id_usuario', 'tipo', 'contato');
            }])->get();

        return response()->json($alunoInfo->toArray()[0]);
    }

    public function editAlunoPessoal($aluno,Request $request)
    {

        $aluno = Usuario::find($request->id);
        $aluno->nome_completo = $request->nome;
        $aluno->data_nascimento = $request->dtnascimento;
        $endereco = Endereco::where('id_cidade', '=', $request->id_cidade)
            ->where('endereco', '=', $request->endereco)
            ->where('bairro', '=', $request->bairro)
            ->where('numero', '=', $request->numero)
            ->get();
        if (count($endereco) == 0) {
            $endereco = Endereco::create($request->only(['id_cidade', 'endereco', 'bairro', 'numero']))['id'];
            $aluno->id_endereco = $endereco;
        }
        $aluno->save();
        return response()->json($aluno);
    }

    public function editAlunoAcademico(Request $request)
    {
        $aluno = Usuario::find($request->id)->aluno;
        $aluno->matricula = $request->matricula;
        $aluno->semestre_matricula = $request->semestre;
        $aluno->id_curso = $request->curso;
        $aluno->save();
        return response()->json($aluno);
    }

    public function editAlunoContato(Request $request)
    {
        $aluno = Usuario::find($request->id)->contatos;
        foreach ($aluno as $cont) {
            if ($cont->tipo == 'telefone') {
                $cont->contato = $request->telefone;
                $cont->save();
            } else if ($cont->tipo == 'celular') {
                $cont->contato = $request->celular;
                $cont->save();
            } else if ($cont->tipo == 'email') {
                $cont->contato = $request->email;
                $cont->save();
            }
        }
        return response()->json($aluno);
    }

    public function mostrarPerfilAluno(Request $request, $id)
    {
        return view('auth.pages.alunos.informacoes', ['base_url' => config('app.url'), 'idaluno' => $id]);
    }

    public function addObsercacaoAluno(Request $request)
    {
        /*
         *  VALIDAR A OBSERVAÇÃO
         */
        $validacao = Validator::make($request->input(), [
            'observacao' => 'required|min:5',
        ], [
            'required' => 'O campo observação é obrigatório!',
            'min' => 'O campo observação deve ter no mínimo 5 caracteres!'
        ]);

        if ($validacao->fails()) {
            return response()->json([
                'sucesso' => false,
                'code' => 400,
                'msg' => '',
                'errors' => $validacao->errors()
            ], 400);
        }

        /*
         * INSERIR A OBSERVACAO
         */
        $obs = ObservacoesAluno::create([
            'comentario' => $request->input('observacao'),
            'id_aluno' => $request->input('id_aluno')
        ]);

        return response()->json([
            'sucesso' => true,
            'code' => 201,
            'msg' => 'Observação criada com sucesso!',
            'data' => $obs
        ], 201);
    }

    public function listarObservacoes(Request $request)
    {
        $listaObservacoes = ObservacoesAluno::where('id_aluno', '=', $request->id_aluno)->orderByDesc('created_at')->get();

        if($listaObservacoes->isEmpty())
        {
            return response()->json([], 404);
        }

        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Observações carregadas com sucesso!',
            'data' => $listaObservacoes
        ], 200);
    }

    public function apagarObservacao(Request $request)
    {
        $observacao = ObservacoesAluno::find($request->id_observacao);

        if (!$observacao->exists())
        {
            return response()->json([
                'sucesso' => false,
                'code' => 403,
                'msg' => 'Não foi possível apagar essa observação!',
                'data' => ''
            ], 403);
        }

        /*
         * APAGAR OBSERVACAO
         */
        $observacao->delete();
        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Observação apagada com sucesso!',
            'data' => ''
        ], 200);
    }
}
