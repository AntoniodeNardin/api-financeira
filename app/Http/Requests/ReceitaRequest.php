<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'valor' => 'required|numeric|min:0',
            'data' => 'required|date',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
        ];
    }
}
