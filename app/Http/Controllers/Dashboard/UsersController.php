<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\funcionario\Funcionario;
use App\Models\localizacao\Pais;
use App\Models\endereco\Endereco;

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

    public function formularioEditarUsuario(Request $request, $id){
        $func = Funcionario::find($id);
        $func->siape = (string) $func->siape;
        $func->usuario->toArray();
        $func->usuario->endereco->toArray();
        $func->usuario->endereco->cidade->toArray();
        $func->usuario->endereco->cidade->estado->toArray();
        $func->usuario->endereco->cidade->estado->pais->toArray();
        $func->usuario->contatos->toArray();
		return view('auth.pages.editar-funcionario.editar-funcionario', ['funcionario' => $func, 'base_url' => config('app.url') ]);
	}
    
    public function atualizaUsuario(Request $request, $tipo){
        if ($tipo == 'pessoais'){
            $func = Funcionario::find($request->id)->usuario;
            $func->nome_completo = $request->nome;
            $func->data_nascimento = $request->dtnascimento;
            $endereco = Endereco::where('id_cidade', '=', $request->id_cidade)
                ->where('endereco', '=', $request->endereco)
                ->where('bairro', '=', $request->bairro)
                ->where('numero', '=', $request->numero)
                ->get();
            if (count($endereco) == 0){
                $endereco = Endereco::create($request->only(['id_cidade', 'endereco', 'bairro', 'numero']))['id'];
                $func->id_endereco = $endereco;
            }
            $func->save();
            return response()->json(count($endereco));
        }else if ($tipo == 'contato') {
            $func = Funcionario::find($request->id)->usuario->contatos;
            foreach($func as $cont) {
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
            return response()->json($func);
        }else if ($tipo == 'profissionais') {
            $func = Funcionario::find($request->id);
            $func->crp = $request->crp;
            $func->siape = $request->siape;
            $func->save();
            return response()->json($func);
        } else {
            return response()->json(['status' => 'requisição invalida!']);
        }
    }
}
