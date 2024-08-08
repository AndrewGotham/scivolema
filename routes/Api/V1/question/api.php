<?php

use App\Http\Controllers\Api\V1\Auth\ChangePasswordApiController;
use App\Http\Controllers\Api\V1\Auth\LoginApiController;
use App\Http\Controllers\Api\V1\Auth\LogoutApiController;
use App\Http\Controllers\Api\V1\Auth\UpdateUserApiController;
use App\Http\Controllers\Api\V1\Auth\UserApiController;
use App\Http\Controllers\Api\V1\QuestionApiController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::controller(QuestionApiController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/user/questions', 'authUserQuestions');
    Route::post('/questions', 'store');
    Route::put('/questions/{question}/update', 'update');
    Route::delete('/questions/{question}/delete', 'destroy');
    Route::put('/questions/{question}/vote-up', 'voteUp');
    Route::put('/questions/{question}/vote-down', 'voteDown');
});

// Guest routes
Route::controller(QuestionApiController::class)->group(function () {
    Route::get('/questions', 'index');
    Route::get('/questions/{question}', 'show');
    Route::get('/tags/{tag}/{question}', 'questionsByTag');
    Route::post('/user/questions', 'questionsByUser'); // post method to prevent sending user id in the url
});
