<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('site.user.index', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {
        return view('site.user.show', compact('user'));
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }
}
