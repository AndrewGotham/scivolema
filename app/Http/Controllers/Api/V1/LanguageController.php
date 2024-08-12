<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageStoreRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Http\Resources\LanguageCollection;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    public function index(Request $request): LanguageCollection
    {
        $this->authorize('view-any', Language::class);

        $search = $request->get('search', '');

        $languages = Language::search($search)
            ->latest()
            ->paginate();

        return new LanguageCollection($languages);
    }

    public function store(LanguageStoreRequest $request): LanguageResource
    {
        $this->authorize('create', Language::class);

        $validated = $request->validated();

        $language = Language::create($validated);

        return new LanguageResource($language);
    }

    public function show(Request $request, Language $language): LanguageResource
    {
        $this->authorize('view', $language);

        return new LanguageResource($language);
    }

    public function update(
        LanguageUpdateRequest $request,
        Language $language
    ): LanguageResource {
        $this->authorize('update', $language);

        $validated = $request->validated();

        $language->update($validated);

        return new LanguageResource($language);
    }

    public function destroy(Request $request, Language $language): Response
    {
        $this->authorize('delete', $language);

        $language->delete();

        return response()->noContent();
    }
}
