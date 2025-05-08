<?php

namespace App\Policies;

use App\Models\Receita;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReceitaPolicy
{
    public function view(User $user, Receita $receita): bool
    {
        return $user->id === $receita->user_id;
    }

    public function update(User $user, Receita $receita): bool
    {
        return $user->id === $receita->user_id;
    }

    public function delete(User $user, Receita $receita): bool
    {
        return $user->id === $receita->user_id;
    }

}
