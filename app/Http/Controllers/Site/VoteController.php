<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\VoteApiRequest;
use App\Http\Resources\VoteResource;
use App\Models\Vote;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VoteController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $votes = Vote::all();

        return view('site.vote.index', compact('votes'));
    }

    public function store(VoteApiRequest $request)
    {
        $this->authorize('create', Vote::class);

        return new VoteResource(Vote::create($request->validated()));
    }

    public function show(Vote $vote)
    {
        return view('site.vote.show', compact('vote'));
    }

    public function update(VoteApiRequest $request, Vote $vote)
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
