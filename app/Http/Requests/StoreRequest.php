<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'         => 'required',
            'description'  => 'required',
            'phone'        => 'required',
            'mobile_phone' => 'required',
            'logo'         => 'required|image',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'image' => 'Arquivo nao é uma imagem válida',
        ];
    }
}
