<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

//    public function viewAny(User $user): bool
//    {
//
//    }
//
//    public function view(User $user, Answer $answer): bool
//    {
//    }

    public function create(User $user): bool
    {
        return auth()->check();
    }

    public function update(User $user, Answer $answer): bool
    {
        return $user->id === $answer->user_id;
    }

    public function delete(User $user, Answer $answer): bool
    {
        return $user->id === $answer->user_id;
    }

    public function markAsBest(User $user, Answer $answer): bool
    {
        return $user->id === $answer->question->user_id;
    }
}
