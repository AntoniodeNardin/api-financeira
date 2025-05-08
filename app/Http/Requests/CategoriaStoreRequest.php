<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ou alguma lógica de autorização
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode exceder 100 caracteres.',
        ];
    }
}
