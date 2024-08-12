<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Vote;
use App\Http\Controllers\Controller;
use App\Http\Resources\VoteCollection;
use App\Http\Resources\VoteResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserVotesController extends Controller
{
    public function index(Request $request, User $user): VoteCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $votes = $user
            ->votes()
            ->search($search)
            ->latest()
            ->paginate();

        return new VoteCollection($votes);
    }

    public function store(Request $request, User $user): VoteResource
    {
        $this->authorize('create', Vote::class);

        $validated = $request->validate([
            'upvote' => ['required', 'boolean'],
            'voteable_id' => ['required', 'max:255'],
            'voteable_type' => ['required', 'max:255', 'string'],
        ]);

        $vote = $user->votes()->create($validated);

        return new VoteResource($vote);
    }
}
