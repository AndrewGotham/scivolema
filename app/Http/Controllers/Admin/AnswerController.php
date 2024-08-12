<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\AnswerUpdateRequest;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Answer::class);

        $search = $request->get('search', '');

        $answers = Answer::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.answers.index', compact('answers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Answer::class);

        $users = User::pluck('name', 'id');
        $questions = Question::pluck('title', 'id');

        return view('app.answers.create', compact('users', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Answer::class);

        $validated = $request->validated();

        $answer = Answer::create($validated);

        return redirect()
            ->route('answers.edit', $answer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Answer $answer): View
    {
        $this->authorize('view', $answer);

        return view('app.answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Answer $answer): View
    {
        $this->authorize('update', $answer);

        $users = User::pluck('name', 'id');
        $questions = Question::pluck('title', 'id');

        return view(
            'app.answers.edit',
            compact('answer', 'users', 'questions')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AnswerUpdateRequest $request,
        Answer $answer
    ): RedirectResponse {
        $this->authorize('update', $answer);

        $validated = $request->validated();

        $answer->update($validated);

        return redirect()
            ->route('answers.edit', $answer)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Answer $answer): RedirectResponse
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return redirect()
            ->route('answers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
