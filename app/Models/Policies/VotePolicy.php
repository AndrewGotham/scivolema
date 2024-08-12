<?php

namespace App\Models\Policies;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the vote can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list votes');
    }

    /**
     * Determine whether the vote can view the model.
     */
    public function view(User $user, Vote $model): bool
    {
        return $user->hasPermissionTo('view votes');
    }

    /**
     * Determine whether the vote can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create votes');
    }

    /**
     * Determine whether the vote can update the model.
     */
    public function update(User $user, Vote $model): bool
    {
        return $user->hasPermissionTo('update votes');
    }

    /**
     * Determine whether the vote can delete the model.
     */
    public function delete(User $user, Vote $model): bool
    {
        return $user->hasPermissionTo('delete votes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete votes');
    }

    /**
     * Determine whether the vote can restore the model.
     */
    public function restore(User $user, Vote $model): bool
    {
        return false;
    }

    /**
     * Determine whether the vote can permanently delete the model.
     */
    public function forceDelete(User $user, Vote $model): bool
    {
        return false;
    }
}
