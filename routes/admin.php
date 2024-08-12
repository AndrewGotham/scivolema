<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\Api\V1\LanguageQuestionsController;
use App\Http\Controllers\Api\V1\LanguageUsersController;
use App\Http\Controllers\Api\V1\QuestionAnswersController;
use App\Http\Controllers\Api\V1\UserAnswersController;
use App\Http\Controllers\Api\V1\UserQuestionsController;
use App\Http\Controllers\Api\V1\UserVotesController;

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('languages', LanguageController::class);

        // Language Users
        Route::get('/languages/{language}/users', [
            LanguageUsersController::class,
            'index',
        ])->name('languages.users.index');
        Route::post('/languages/{language}/users', [
            LanguageUsersController::class,
            'store',
        ])->name('languages.users.store');

        // Language Questions
        Route::get('/languages/{language}/questions', [
            LanguageQuestionsController::class,
            'index',
        ])->name('languages.questions.index');
        Route::post('/languages/{language}/questions', [
            LanguageQuestionsController::class,
            'store',
        ])->name('languages.questions.store');

        Route::apiResource('users', UserController::class);

        // User Questions
        Route::get('/users/{user}/questions', [
            UserQuestionsController::class,
            'index',
        ])->name('users.questions.index');
        Route::post('/users/{user}/questions', [
            UserQuestionsController::class,
            'store',
        ])->name('users.questions.store');

        // User Answers
        Route::get('/users/{user}/answers', [
            UserAnswersController::class,
            'index',
        ])->name('users.answers.index');
        Route::post('/users/{user}/answers', [
            UserAnswersController::class,
            'store',
        ])->name('users.answers.store');

        // User Votes
        Route::get('/users/{user}/votes', [
            UserVotesController::class,
            'index',
        ])->name('users.votes.index');
        Route::post('/users/{user}/votes', [
            UserVotesController::class,
            'store',
        ])->name('users.votes.store');

        Route::apiResource('questions', QuestionController::class);

        // Question Answers
        Route::get('/questions/{question}/answers', [
            QuestionAnswersController::class,
            'index',
        ])->name('questions.answers.index');
        Route::post('/questions/{question}/answers', [
            QuestionAnswersController::class,
            'store',
        ])->name('questions.answers.store');

        Route::apiResource('answers', AnswerController::class);

        Route::apiResource('votes', VoteController::class);
    });
