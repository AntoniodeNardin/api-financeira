<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoriaPolicy
{
    public function view(User $user, Categoria $categoria): bool
    {
        return $user->id === $categoria->user_id;
    }

    public function update(User $user, Categoria $categoria): bool
    {
        return $user->id === $categoria->user_id;
    }

    public function delete(User $user, Categoria $categoria): bool
    {
        return $user->id === $categoria->user_id;
    }
}
