<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Question $question): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return auth()->check();
    }

    public function update(User $user, Question $question): bool
    {
        return $user->id === $question->user_id;
    }

    public function delete(User $user, Question $question): bool
    {
        return $user->id === $question->user_id;
    }

    public function restore(User $user, Question $question): bool
    {
        return false;
    }

    public function forceDelete(User $user, Question $question): bool
    {
        return false;
    }
}
