<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('home');
 });


Route::get('/home', function () {
    return view('home');
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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    $posts = auth()->user()->usersCoolPosts()->latest()->get();
    return view('dashboard', ['posts' => $posts]);
})->middleware('auth');

Route::get('/news', [PostController::class, 'news']);
Route::get('/about', function () {
    return view('about');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
