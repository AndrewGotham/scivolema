<?php

use App\Http\Controllers\Api\V1\AnswerApiController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::controller(AnswerApiController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/user/answers', 'authUserAnswers'); // not quite sure if needed, if yes, add method to the controller first
    Route::post('/answer/{question}', 'store');
    Route::put('/answers/{question}/{answer}/update', 'update');
    Route::delete('/answers/{question}/{answer}', 'destroy');
    Route::put('/answers/{answer}/vote-up', 'voteUp');
    Route::put('/answers/{answer}/vote-down', 'voteDown');
    Route::put('/answers/{answer}/mark-as-best', 'markAsBest');
});

// Guest routes
Route::controller(AnswerApiController::class)->group(function () {
//    Route::get('/answers', 'index'); // we don't have index, do we need one?
    Route::get('/answers/{answer}', 'show');
    Route::post('/user/answers', 'answersByUser'); // post method to prevent sending user id in the url
});
