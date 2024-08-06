<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Answer $answer): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Answer $answer): bool
    {
    }

    public function delete(User $user, Answer $answer): bool
    {
    }

    public function restore(User $user, Answer $answer): bool
    {
    }

    public function forceDelete(User $user, Answer $answer): bool
    {
    }
}
