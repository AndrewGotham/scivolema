<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LanguageUsersController extends Controller
{
    public function index(Request $request, Language $language): UserCollection
    {
        $this->authorize('view', $language);

        $search = $request->get('search', '');

        $users = $language
            ->users()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    public function store(Request $request, Language $language): UserResource
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required'],
            'slug' => ['required', 'max:255', 'string'],
            'avatar' => ['nullable', 'file'],
            'status' => ['required', 'in:active,inactive,blocked'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $user = $language->users()->create($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }
}
