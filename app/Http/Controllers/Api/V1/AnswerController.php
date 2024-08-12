<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\AnswerUpdateRequest;
use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswerController extends Controller
{
    public function index(Request $request): AnswerCollection
    {
        $this->authorize('view-any', Answer::class);

        $search = $request->get('search', '');

        $answers = Answer::search($search)
            ->latest()
            ->paginate();

        return new AnswerCollection($answers);
    }

    public function store(AnswerStoreRequest $request): AnswerResource
    {
        $this->authorize('create', Answer::class);

        $validated = $request->validated();

        $answer = Answer::create($validated);

        return new AnswerResource($answer);
    }

    public function show(Request $request, Answer $answer): AnswerResource
    {
        $this->authorize('view', $answer);

        return new AnswerResource($answer);
    }

    public function update(
        AnswerUpdateRequest $request,
        Answer $answer
    ): AnswerResource {
        $this->authorize('update', $answer);

        $validated = $request->validated();

        $answer->update($validated);

        return new AnswerResource($answer);
    }

    public function destroy(Request $request, Answer $answer): Response
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return response()->noContent();
    }
}
