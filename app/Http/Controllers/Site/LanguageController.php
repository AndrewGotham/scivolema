<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LanguageApiRequest;
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

    public function store(LanguageApiRequest $request)
    {
        $this->authorize('create', Language::class);

        return new LanguageResource(Language::create($request->validated()));
    }

    public function show(Language $languages)
    {
        $this->authorize('view', $languages);

        return new LanguageResource($languages);
    }

    public function update(LanguageApiRequest $request, Language $languages)
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
