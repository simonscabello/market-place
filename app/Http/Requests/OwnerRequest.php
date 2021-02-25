<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
        return  [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, insira um nome',
            'name.string' => 'Por favor, insira um nome válido',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',

            'email.required' => 'Por favor, insira um e-mail',
            'email.string' => 'Por favor, insira um e-mail válido',
            'email.email' => 'Por favor, insira um e-mail válido',
            'email.max' => 'O campo e-mail deve ter no máximo 255 caracteres',

            'password.required' => 'Por favor, insira uma senha',
            'password.min' => 'O campo password deve ter pelo menos 8 caracteres',

            'role.required' => 'Por favor, selecione o tipo de usuário'

        ];
    }
}
