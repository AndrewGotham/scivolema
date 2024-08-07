<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Api\V1\StoreUserApiRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController
{
    public function __invoke(StoreUserApiRequest $request)
    {
        if($request->validated())
        {
            $data = $request->validated();
//            $data['password'] = bcrypt($data['password']);
            $data['password'] = Hash::make($request->password);
            User::create($data);
            return redirect()->route('login')->with('success', 'Registration was successful!');
        }

        return redirect()->route('register')->with('error', 'Registration failed!');
    }
}
