<?php

namespace App\Policies;

use App\Models\User;

use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        // Si no quieres que OWN vea el listado de usuarios, deja esto en canManageUsers:
        return $this->canManageUsers($user);
    }

    public function create(User $user): bool
    {
        return $this->canManageUsers($user);
    }

    // Puedes extender con update/delete si lo necesitas
    public function update(User $user, User $model): bool
    {
        return $this->canManageUsers($user);
    }

    public function delete(User $user, User $model): bool
    {
        return $this->canManageUsers($user);
    }

    private function canManageUsers(User $user): bool
    {
        return $user->canViewAllFellowEvals();
    }
}
