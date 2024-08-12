<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Answer;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionAnswersController extends Controller
{
    public function index(
        Request $request,
        Question $question
    ): AnswerCollection {
        $this->authorize('view', $question);

        $search = $request->get('search', '');

        $answers = $question
            ->answers()
            ->search($search)
            ->latest()
            ->paginate();

        return new AnswerCollection($answers);
    }

    public function store(Request $request, Question $question): AnswerResource
    {
        $this->authorize('create', Answer::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'body' => ['required', 'max:255', 'string'],
            'score' => ['required', 'max:255'],
            'best_answer' => ['required', 'boolean'],
            'status' => ['required', 'in:published,pending,rejected'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ]);

        $answer = $question->answers()->create($validated);

        return new AnswerResource($answer);
    }
}
