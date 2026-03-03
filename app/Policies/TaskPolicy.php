<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // qualquer usuário logado vê a lista da sua empresa
    }

    public function view(User $user, Task $task): bool
    {
        return true; // scope já garante que é da empresa
    }

    public function create(User $user): bool
    {
        return true; // ou: $user->isAdmin()
    }

    public function update(User $user, Task $task): bool
    {
        // exemplo: admin da empresa pode editar qualquer um,
        // membro só edita se for o owner
        if ($user->isAdmin()) {
            return true;
        }

        return $task->user_id === $user->id;
    }

    public function delete(User $user, Task $task): bool
    {
        // geralmente mais restrito
        return $user->isAdmin();
    }
}
