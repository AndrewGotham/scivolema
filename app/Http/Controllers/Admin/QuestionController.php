<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Question;
use App\Models\Language;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Question::class);

        $search = $request->get('search', '');

        $questions = Question::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.questions.index', compact('questions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Question::class);

        $users = User::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');

        return view('app.questions.create', compact('users', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Question::class);

        $validated = $request->validated();
        $validated['tags'] = json_decode($validated['tags'], true);

        $question = Question::create($validated);

        return redirect()
            ->route('questions.edit', $question)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Question $question): View
    {
        $this->authorize('view', $question);

        return view('app.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Question $question): View
    {
        $this->authorize('update', $question);

        $users = User::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');

        return view(
            'app.questions.edit',
            compact('question', 'users', 'languages')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        QuestionUpdateRequest $request,
        Question $question
    ): RedirectResponse {
        $this->authorize('update', $question);

        $validated = $request->validated();
        $validated['tags'] = json_decode($validated['tags'], true);

        $question->update($validated);

        return redirect()
            ->route('questions.edit', $question)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Question $question
    ): RedirectResponse {
        $this->authorize('delete', $question);

        $question->delete();

        return redirect()
            ->route('questions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
