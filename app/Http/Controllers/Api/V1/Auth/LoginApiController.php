<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Requests\Api\V1\AuthUserApiRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class LoginApiController
{
    public function __invoke(AuthUserApiRequest $request)
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
