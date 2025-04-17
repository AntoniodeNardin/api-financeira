<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceitaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'valor' => $this->valor,
            'data' => $this->data,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria?->nome,
            'criado_em' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}

