<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoteStoreRequest;
use App\Http\Requests\VoteUpdateRequest;
use App\Http\Resources\VoteCollection;
use App\Http\Resources\VoteResource;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoteController extends Controller
{
    public function index(Request $request): VoteCollection
    {
        $this->authorize('view-any', Vote::class);

        $search = $request->get('search', '');

        $votes = Vote::search($search)
            ->latest()
            ->paginate();

        return new VoteCollection($votes);
    }

    public function store(VoteStoreRequest $request): VoteResource
    {
        $this->authorize('create', Vote::class);

        $validated = $request->validated();

        $vote = Vote::create($validated);

        return new VoteResource($vote);
    }

    public function show(Request $request, Vote $vote): VoteResource
    {
        $this->authorize('view', $vote);

        return new VoteResource($vote);
    }

    public function update(VoteUpdateRequest $request, Vote $vote): VoteResource
    {
        $this->authorize('update', $vote);

        $validated = $request->validated();

        $vote->update($validated);

        return new VoteResource($vote);
    }

    public function destroy(Request $request, Vote $vote): Response
    {
        $this->authorize('delete', $vote);

        $vote->delete();

        return response()->noContent();
    }
}
