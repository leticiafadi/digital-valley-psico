<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         => 'required | exists:password_resets',
            'token'         => 'required | exists:password_resets',
            'senha'         => 'required | min:6 | same:repetir_senha',
            'repetir_senha' => 'required | min:6'
        ];
    }

    public function messages(){
        return [
            'required'          => "O campo :attribute é obrigatório.",
            'token.exists'      => "Não existe esse email em nossa base de dados.",
            'token.required'    => "O link é inválido."
        ];
    }
}
