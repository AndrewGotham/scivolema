<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AnswerApiRequest;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnswerController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Answer::class);

        return AnswerResource::collection(Answer::all());
    }

    public function store(AnswerApiRequest $request)
    {
        $this->authorize('create', Answer::class);

        return new AnswerResource(Answer::create($request->validated()));
    }

    public function show(Answer $answer)
    {
        $this->authorize('view', $answer);

        return new AnswerResource($answer);
    }

    public function update(AnswerApiRequest $request, Answer $answer)
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
