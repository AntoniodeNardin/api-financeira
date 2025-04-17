<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'objetivo' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
        ];
    }
}
