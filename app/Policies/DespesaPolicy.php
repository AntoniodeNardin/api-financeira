<?php

namespace App\Policies;

use App\Models\Despesa;
use App\Models\User;

class DespesaPolicy
{
    /**
     * Determina se o usuário pode visualizar a despesa.
     */
    public function view(User $user, Despesa $despesa): bool
    {
        return $user->id === $despesa->user_id;
    }

    /**
     * Determina se o usuário pode atualizar a despesa.
     */
    public function update(User $user, Despesa $despesa): bool
    {
        return $user->id === $despesa->user_id;
    }

    /**
     * Determina se o usuário pode deletar a despesa.
     */
    public function delete(User $user, Despesa $despesa): bool
    {
        return $user->id === $despesa->user_id;
    }
}
