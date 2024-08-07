<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserApiRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        //
    }

    public function store(AuthUserApiRequest $request)
    {
//        if($request->validated())
//        {
            $user = User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password))
            {
                throw ValidationException::withMessages(
                    'email or password is incorrect',
                );
            } else {
                return UserResource::make($user)->additional([
                    'access_token' => $user->createToken('user')->plainTextToken,
                ]);
            }
//        }
    }
}
