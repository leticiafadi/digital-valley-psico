<?php

namespace App\Http\Controllers\Traits;

use App\Models\endereco\Endereco;
use App\Models\usuarios\Usuario;
use App\Models\aluno\Aluno;
use App\Models\localizacao\Cidade;
use App\Models\localizacao\Estado;
use App\Models\localizacao\Pais;
use App\Models\contato\Contato;
use App\Models\curso\Curso;

trait BuscarAluno{


    private function Buscar($id){
        
        $aluno    = Aluno::find($id);
        $usuario  = Usuario::find($aluno->id_usuario);
        $endereco = Endereco::find($usuario->id_endereco);
        $cidade   = Cidade::find($endereco->id_cidade);
        $estado   = Estado::find($cidade->state_id);
        $pais     = Pais::find($estado->country_id);
        $contato  = Contato::where('id_usuario',$usuario->id)->get();
        $curso    = Curso::find($aluno->id_curso);

        $dados_aluno=[
            'nome_completo'      => $usuario->nome_completo,
            'matricula'          => $aluno->matricula,
            'semestre_matricula' => $aluno->semestre_matricula,
            'data_nascimento'    => $usuario->data_nascimento,
            'genero'             => $usuario->genero,
            'endereco'   => [
                'rua'    => $endereco->endereco,
                'numero' => $endereco->numero,
                'bairro' => $endereco->bairro,
                'cidade' => $cidade->name,
                'estado' => $estado->name,
                'pais'   => $pais->name,
            ],
            'contatos' => $this->formatContat($contato),
            'curso'    => $curso->nome,
            'id_curso' => $curso->id
        ];
        return $dados_aluno;
    }

    private function formatContat($contato){
        $contatos = [];
        $i = 0;
        foreach($contato as $c){
            $contatos[$i] = [
                'contato' => $c->contato,
                'tipo'    => $c->tipo
            ];
            $i++;
        }
        return $contatos;
    }

    private function BuscarInfo($id){
                
        $aluno    = Aluno::where('id_usuario',$id)->first();
        $usuario  = Usuario::find($id);
        $endereco = Endereco::find($usuario->id_endereco);
        $cidade   = Cidade::find($endereco->id_cidade);
        $estado   = Estado::find($cidade->state_id);
        $pais     = Pais::find($estado->country_id);
        $contato  = Contato::where('id_usuario',$usuario->id)->get();
        //dd($aluno);
        $curso    = Curso::find($aluno->id_curso);

        $dados_aluno=[
            'nome_completo'      => $usuario->nome_completo,
            'matricula'          => $aluno->matricula,
            'semestre_matricula' => $aluno->semestre_matricula,
            'data_nascimento'    => $usuario->data_nascimento,
            'genero'             => $usuario->genero,
            'endereco'   => [
                'rua'    => $endereco->endereco,
                'numero' => $endereco->numero,
                'bairro' => $endereco->bairro,
                'cidade' => $cidade->name,
                'estado' => $estado->name,
                'pais'   => $pais->name,
            ],
            'contatos' => $this->formatContat($contato),
            'curso'    => $curso->nome,
            'id_curso' => $curso->id
        ];
        return $dados_aluno;
    }

}