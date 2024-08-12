<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vote;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VoteStoreRequest;
use App\Http\Requests\VoteUpdateRequest;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Vote::class);

        $search = $request->get('search', '');

        $votes = Vote::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.votes.index', compact('votes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Vote::class);

        $users = User::pluck('name', 'id');

        return view('app.votes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoteStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Vote::class);

        $validated = $request->validated();

        $vote = Vote::create($validated);

        return redirect()
            ->route('votes.edit', $vote)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Vote $vote): View
    {
        $this->authorize('view', $vote);

        return view('app.votes.show', compact('vote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Vote $vote): View
    {
        $this->authorize('update', $vote);

        $users = User::pluck('name', 'id');

        return view('app.votes.edit', compact('vote', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        VoteUpdateRequest $request,
        Vote $vote
    ): RedirectResponse {
        $this->authorize('update', $vote);

        $validated = $request->validated();

        $vote->update($validated);

        return redirect()
            ->route('votes.edit', $vote)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Vote $vote): RedirectResponse
    {
        $this->authorize('delete', $vote);

        $vote->delete();

        return redirect()
            ->route('votes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
