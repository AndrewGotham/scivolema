<?php

namespace App\Models\Policies;

use App\Models\Page;
use App\Models\User;

class PagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list pages');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('view pages');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create pages');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Page $page): bool
    {
        return $user->id === $page->user_id || $user->hasPermissionTo('update pages');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Page $page): bool
    {
        return $user->id === $page->user_id || $user->hasPermissionTo('delete pages');
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete pages');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Page $page): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Page $page): bool
    {
        return false;
    }
}
