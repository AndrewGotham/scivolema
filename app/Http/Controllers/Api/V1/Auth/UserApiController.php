<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
//        return new UserCollection(User::all()->keyBy->name);
        return new UserCollection(User::paginate(10)->with(['questions','answers']));
    }

    public function store(Request $request)
    {
    }

    public function show(User $user, Request $request)
    {
        return UserResource::make($user);
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }

    public function self(Request $request)
    {
        return UserResource::make($request->user());
    }
}
