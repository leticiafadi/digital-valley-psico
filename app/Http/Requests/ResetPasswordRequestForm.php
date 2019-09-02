<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class ResetPasswordRequestForm extends FormRequest
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
            'email' => 'required | exists:item_login,usuario'
        ];
    }

    public function messages(){
        return [
            'email.required'    => "O campo Email é obrigatório.",
            'email.exists'      => "Não existe esse email em nossa base de dados."
        ];
    }
}
