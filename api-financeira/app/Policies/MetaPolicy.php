<?php

namespace App\Policies;

use App\Models\Meta;
use App\Models\User;

class MetaPolicy
{
    /**
     * Permite que o usuário veja qualquer meta (opcional, pode retornar false).
     */
    public function viewAny(User $user): bool
    {
        return true; // ou false, dependendo da regra de negócios
    }

    /**
     * Permite visualizar a meta se for do próprio usuário.
     */
    public function view(User $user, Meta $meta): bool
    {
        return $user->id === $meta->user_id;
    }

    /**
     * Permite criar uma meta.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Permite atualizar a meta se for do próprio usuário.
     */
    public function update(User $user, Meta $meta): bool
    {
        return $user->id === $meta->user_id;
    }

    /**
     * Permite deletar a meta se for do próprio usuário.
     */
    public function delete(User $user, Meta $meta): bool
    {
        return $user->id === $meta->user_id;
    }

    /**
     * (Opcional) Permite restaurar a meta se for do próprio usuário.
     */
    public function restore(User $user, Meta $meta): bool
    {
        return $user->id === $meta->user_id;
    }

    /**
     * (Opcional) Permite deletar permanentemente se for do próprio usuário.
     */
    public function forceDelete(User $user, Meta $meta): bool
    {
        return $user->id === $meta->user_id;
    }
}
