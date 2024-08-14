<?php

use App\Http\Controllers\Site\AnswerController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\LanguageController;
use App\Http\Controllers\Site\QuestionController;
use App\Http\Controllers\Site\TagController;
use Illuminate\Support\Facades\Route;

Route::post('/language-switch', LanguageController::class)->name('language-switch');

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::middleware(['auth'])
//    ->get('/admin', function () {
//        return view('dashboard');
//    })
//    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
Route::get('/answers', [AnswerController::class, 'index'])->name('answers');
Route::get('/tags', [TagController::class, 'index'])->name('tags');

Route::get('/', [HomeController::class, 'index'])->name('home');
