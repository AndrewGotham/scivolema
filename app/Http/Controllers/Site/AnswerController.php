<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UpdateAnswerApiRequest;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnswerController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $answers = Answer::all();

        return view('site.answer.index', compact('answers'));
    }

    public function store(UpdateAnswerApiRequest $request)
    {
        $this->authorize('create', Answer::class);

        return new AnswerResource(Answer::create($request->validated()));
    }

    public function show(Answer $answer)
    {
        $this->authorize('view', $answer);

        return new AnswerResource($answer);
    }

    public function update(UpdateAnswerApiRequest $request, Answer $answer)
    {
        $this->authorize('update', $answer);

        $answer->update($request->validated());

        return new AnswerResource($answer);
    }

    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return response()->json();
    }
}
