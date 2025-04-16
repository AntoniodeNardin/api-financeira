<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DespesaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'data' => $this->data,
            'categoria' => $this->categoria,
            'criado_em' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}
