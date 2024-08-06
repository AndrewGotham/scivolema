<?php

namespace App\Policies;

use App\Models\Language;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Language $languages)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Language $languages)
    {
    }

    public function delete(User $user, Language $languages)
    {
    }

    public function restore(User $user, Language $languages)
    {
    }

    public function forceDelete(User $user, Language $languages)
    {
    }
}
