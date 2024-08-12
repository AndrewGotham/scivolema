<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])
    ->get('/admin', function () {
        return view('dashboard');
    })
    ->name('dashboard');

require __DIR__ . '/auth.php';
