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

require __DIR__ . '/user/api.php';
require __DIR__ . '/question/api.php';
