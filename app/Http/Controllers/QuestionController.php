<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Question::class);

        return QuestionResource::collection(Question::all());
    }

    public function store(QuestionRequest $request)
    {
        $this->authorize('create', Question::class);

        return new QuestionResource(Question::create($request->validated()));
    }

    public function show(Question $question)
    {
        $this->authorize('view', $question);

        return new QuestionResource($question);
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->update($request->validated());

        return new QuestionResource($question);
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return response()->json();
    }
}
