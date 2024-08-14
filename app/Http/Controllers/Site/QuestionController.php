<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreQuestionApiRequest;
use App\Http\Requests\Api\V1\UpdateQuestionApiRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\UserResource;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $questions = Question::paginate();

        return view('site.question.index', compact('questions'));
    }

    public function store(StoreQuestionApiRequest $request)
    {
        $this->authorize('create', Question::class);

        return new QuestionResource(Question::create($request->validated()));
    }

    public function show(Question $question)
    {
        return view('site.question.show', compact('question'));
    }

    public function update(UpdateQuestionApiRequest $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->update($request->validated());

        return QuestionResource::make($question)->additional([
            'user' => UserResource::make($request->user()),
            'message' => 'Question updated successfully.'
        ]);
    }

    public function destroy(Question $question, Request $request)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return response()->json([
            'user' => UserResource::make($request->user()),
            'message' => 'Question deleted successfully.'
        ]);
    }
}
