<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LanguageController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Language::class);

        return LanguageResource::collection(Language::all());
    }

    public function store(LanguageRequest $request)
    {
        $this->authorize('create', Language::class);

        return new LanguageResource(Language::create($request->validated()));
    }

    public function show(Language $languages)
    {
        $this->authorize('view', $languages);

        return new LanguageResource($languages);
    }

    public function update(LanguageRequest $request, Language $languages)
    {
        $this->authorize('update', $languages);

        $languages->update($request->validated());

        return new LanguageResource($languages);
    }

    public function destroy(Language $languages)
    {
        $this->authorize('delete', $languages);

        $languages->delete();

        return response()->json();
    }
}
