<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;

class LogoutApiController
{
    public function __invoke(Request $request)
    {
        $user = auth('sanctum')->user();

        if ($user) {
            $user->tokens()->where('id', $user->id)->delete();
            return response([
                'message' => 'Successfully logged out'
            ]);
        }

        return response([
            'message' => 'Unauthenticated user'
        ], 401);
    }
}
