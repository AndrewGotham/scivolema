<?php

use App\Http\Controllers\Api\V1\Auth\ChangePasswordApiController;
use App\Http\Controllers\Api\V1\Auth\LoginApiController;
use App\Http\Controllers\Api\V1\Auth\LogoutApiController;
use App\Http\Controllers\Api\V1\Auth\UpdateUserApiController;
use App\Http\Controllers\Api\V1\Auth\UserApiController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Auth routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return UserResource::make($request->user());
    });

    Route::delete('/user/{user}', [UserApiController::class, 'destroy']);
    Route::put('/user', UpdateUserApiController::class);
    Route::post('/user/logout', LogoutApiController::class);
    Route::put('/user/update/password', ChangePasswordApiController::class);

    Route::get('/user', [UserApiController::class, 'self']);
//    Route::get('/users/{user}', [UserApiController::class, 'show']);
    Route::get('/users', [UserApiController::class, 'index']);
});

// Guest routes
Route::post('/login', LoginApiController::class);
Route::post('/register', RegistrationController::class);
Route::post('/user/logout', LogoutApiController::class);
