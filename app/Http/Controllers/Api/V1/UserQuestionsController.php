<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Question;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserQuestionsController extends Controller
{
    public function index(Request $request, User $user): QuestionCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $questions = $user
            ->questions()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuestionCollection($questions);
    }

    public function store(Request $request, User $user): QuestionResource
    {
        $this->authorize('create', Question::class);

        $validated = $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'title' => ['required', 'max:255', 'string'],
            'slug' => [
                'required',
                'unique:questions,slug',
                'max:255',
                'string',
            ],
            'body' => ['required', 'max:255', 'string'],
            'views' => ['required', 'max:255'],
            'score' => ['required', 'max:255'],
            'tags' => ['nullable', 'max:255', 'json'],
            'status' => ['required', 'in:published,pending,rejected'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ]);

        $question = $user->questions()->create($validated);

        return new QuestionResource($question);
    }
}
