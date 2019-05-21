<?php

namespace App\Http\Controllers\Traits;

use App\Models\endereco\Endereco;
use App\Models\usuarios\Usuario;
use App\Models\usuarios\Login;
use App\Models\usuarios\ItemLogin;
use App\Models\contato\Contato;
use App\Models\aluno\Aluno;

use App\Models\dataTempo\Data;

use App\Http\Requests\RegistrarAlunoRequest;

trait RegistrarAluno{

    private function registra(RegistrarAlunoRequest $request){

        $id_endereco = $this->cadastrarEndereco($request->only(['id_cidade','endereco','bairro','numero']));

        //Cadastrar o usurio
        $dados_usuario = [
            'nome_completo'     => $request['nome'],
            'data_nascimento'   => Data::formataDataBrasileiroParaAmericano($request['data_nascimento']),
            'genero'            => $request['genero'],
            'id_endereco'       => $id_endereco,
            'tipo'              => 'aluno'
        ];

        $id_usuario = $this->cadastrarUsuario($dados_usuario);

        //Cadatrar o Login

        $dados_login = [
            'senha'     => $request['senha'],
            'id_usuario' =>  $id_usuario
        ];

        $id_login = $this->cadastrarLogin($dados_login);

        //cadastrar os itens do login

        $dados_itens_login = [
            'id_login'      => $id_login,
            'email'         => $request['email'],
            'matricula'     => $request['matricula'],
        ];

        $this->cadastrarItensLogin($dados_itens_login);

        //cadastrar os contatos

        $dados_contatos = [
            'id_usuario'            => $id_usuario,
            'email'                 => $request['email'],
            'telefone_celular'      => $request['telefone_celular'],
            'telefone_residencial'  => $request['telefone_residencial']
        ];

        $this->cadastrarContatos($dados_contatos);

        $dados_aluno = [
            'matricula'             => $request['matricula'],
            'semestre_matricula'    => $request['semestre_matricula'],
            'id_curso'              => $request['id_curso'],
            'id_usuario'            => $id_usuario
        ];


        $aluno = $this->cadastraAluno($dados_aluno);

    }

    private function cadastraAluno(array $data){
        return Aluno::create($data);
    }


    private function cadastrarEndereco(array $data){
        return  Endereco::create($data)['id'];
    }

    private function cadastrarUsuario(array $data){
        return Usuario::create($data)['id'];
    }

    private function cadastrarLogin(array $data){
        return Login::create($data)['id'];
    }

    private function cadastrarItensLogin(array $data){
        //email
        ItemLogin::create([
            'id_login'  => $data['id_login'],
            'usuario'   => $data['email']
        ]);
        //matricula
        ItemLogin::create([
            'id_login'  => $data['id_login'],
            'usuario'   => $data['matricula']
        ]);

    }

    private function cadastrarContatos(array $data){
        Contato::create([
            'contato'       => $data['email'],
            'tipo'          => 'email',
            'id_usuario'    => $data['id_usuario']
        ]);
        Contato::create([
            'contato'       => $data['telefone_celular'],
            'tipo'          => 'celular',
            'id_usuario'    => $data['id_usuario']
        ]);
        // so cadastrar otelefone residencial se for diferente de nulo
        if($data['telefone_residencial'] != ''){
            Contato::create([
                'contato'       => $data['telefone_residencial'],
                'tipo'          => 'telefone',
                'id_usuario'    => $data['id_usuario']
            ]);
        }
    }
}