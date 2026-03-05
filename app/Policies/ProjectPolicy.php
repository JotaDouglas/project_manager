<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // qualquer usuário logado vê a lista da sua empresa
    }

    public function view(User $user, Project $project): bool
    {
        return true; // scope já garante que é da empresa
    }

    public function create(User $user): bool
    {
        return true; // ou: $user->isAdmin()
    }

    public function update(User $user, Project $project): bool
    {
        // exemplo: admin da empresa pode editar qualquer um,
        // membro só edita se for o owner
        if ($user->isAdmin()) return true;

        return $project->user_id === $user->id;
    }

    public function delete(User $user, Project $project): bool
    {
        // geralmente mais restrito
        return $user->isAdmin();
    }
}