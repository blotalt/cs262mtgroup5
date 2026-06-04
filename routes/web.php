<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
});

Route::get('/pricemarket', function () {
    return view('pricemarket');
});

Route::get('/variety', function () {
    return view('variety');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/register', [UserController::class, 'register']);