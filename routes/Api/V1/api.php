<?php

require __DIR__ . '/user/api.php';
require __DIR__ . '/question/api.php';
require __DIR__ . '/answer/api.php';


use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\LanguageController;
use App\Http\Controllers\Api\V1\LanguageQuestionsController;
use App\Http\Controllers\Api\V1\LanguageUsersController;
use App\Http\Controllers\Api\V1\PermissionController;
use App\Http\Controllers\Api\V1\QuestionAnswersController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserAnswersController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\UserQuestionsController;
use App\Http\Controllers\Api\V1\UserVotesController;
use App\Http\Controllers\Api\V1\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
