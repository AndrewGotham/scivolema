<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Http\Resources\VoteResource;
use App\Models\Vote;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VoteController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Vote::class);

        return VoteResource::collection(Vote::all());
    }

    public function store(VoteRequest $request)
    {
        $this->authorize('create', Vote::class);

        return new VoteResource(Vote::create($request->validated()));
    }

    public function show(Vote $vote)
    {
        $this->authorize('view', $vote);

        return new VoteResource($vote);
    }

    public function update(VoteRequest $request, Vote $vote)
    {
        $this->authorize('update', $vote);

        $vote->update($request->validated());

        return new VoteResource($vote);
    }

    public function destroy(Vote $vote)
    {
        $this->authorize('delete', $vote);

        $vote->delete();

        return response()->json();
    }
}
