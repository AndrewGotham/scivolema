<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserApiRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationApiController extends Controller
{
    public function store(StoreUserApiRequest $request)
    {
        if($request->validated())
        {
            $data = $request->validated();
//            $data['password'] = bcrypt($data['password']);
            $data['password'] = Hash::make($request->password);
            User::create($data);
            return response()->json(['message' => 'Account successfully created.']);
        }

        return response()->json(['message' => 'Invalid request'], 422);
    }
}
