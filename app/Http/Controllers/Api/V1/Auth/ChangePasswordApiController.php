<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordApiController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8|max:255',
            'new_password' => 'required|min:8|max:255',
        ]);
        if(!Hash::check($request->current_password, $request->user()->password))
        {
            return response()->json([
                'error' => 'Your current password does not match a password you just provided. Please try again.',
            ]);
        } else {
            $request->user()->update([
                'password' => Hash::make($request->new_password),
            ]);
            return response()->json([
                'success' => 'Your password has been changed successfully.',
            ]);
        }

        return response()->json([
            'error' => 'No luck :(',
        ]);
    }
}
