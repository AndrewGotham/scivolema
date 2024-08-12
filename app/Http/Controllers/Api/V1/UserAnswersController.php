<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Answer;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserAnswersController extends Controller
{
    public function index(Request $request, User $user): AnswerCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $answers = $user
            ->answers()
            ->search($search)
            ->latest()
            ->paginate();

        return new AnswerCollection($answers);
    }

    public function store(Request $request, User $user): AnswerResource
    {
        $this->authorize('create', Answer::class);

        $validated = $request->validate([
            'question_id' => ['required', 'exists:questions,id'],
            'body' => ['required', 'max:255', 'string'],
            'score' => ['required', 'max:255'],
            'best_answer' => ['required', 'boolean'],
            'status' => ['required', 'in:published,pending,rejected'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ]);

        $answer = $user->answers()->create($validated);

        return new AnswerResource($answer);
    }
}
