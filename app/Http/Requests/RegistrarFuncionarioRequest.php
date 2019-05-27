<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class RegistrarFuncionarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //valida o endereco
            'endereco'              => 'required|string|min:10|max:63',
            'numero'                => 'required|numeric|min:1',
            'bairro'                => 'required|string|min:5|max:31',
            'id_cidade'             => 'required|exists:cidade,id',
            //valida o usuario
            'nome'                  => 'required|string|min:3|max:191',
            'genero'                => 'required|in:m,f',
            'data_nascimento'       => 'required|regex:/\d{2}\/\d{2}\/\d{4}/',
            //valida os itens do login
            'email'                 => 'required|unique:contato,contato|unique:item_login,usuario',
            'siape'                 => 'required|unique:funcionario,siape|regex:/^\d{7}$/',
            'crp'                   => 'required|unique:funcionario,crp|regex:/^\d{2}\/\d{5}$/',
            //validar a senha do login
            'senha'                 => 'required|string|min:6|max:64|same:repete_senha',
            'repete_senha'          => 'required|string|min:6|max:64',
            //validaros contatos
            'telefone_celular'      => 'required|unique:contato,contato|string|min:16|max:16',
            'telefone_residencial'  => 'nullable|string|min:14|max:14'
        ];
    }

    public function messages(){
        return [
            'email.required' => "O campo Email é obrigatório.",
            'email.unique'   => "O campo Email deve ser único, o inserido já pertence a outro usuário.",
            'siape.unique'   => "O campo Siape deve ser único, o inserido já pertence a outro usuário.",
            'crp.unique'     => "O campo CRP deve ser único, o inserido já pertence a outro usuário."
        ];
    }
}
