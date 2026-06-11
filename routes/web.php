<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MarketPriceController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/pricemarket', [MarketPriceController::class, 'index'])->name('pricemarket');;

Route::get('/variety', function () {
    return view('variety');
})->name('variety');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/news', [PostController::class, 'news'])->name('news');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/signup', function () {
    return view('signup');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [UserController::class, 'register'])
    ->name('register.store');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $posts = auth()->user()->usersCoolPosts()->latest()->get();

    return view('dashboard', compact('posts'));
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Market Price CRUD (Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/market-prices', [MarketPriceController::class, 'adminIndex'])
        ->name('market-prices.index');

    Route::get('/market-prices/create', [MarketPriceController::class, 'create'])
        ->name('market-prices.create');

    Route::post('/market-prices', [MarketPriceController::class, 'store'])
        ->name('market-prices.store');

    Route::get('/market-prices/{marketPrice}/edit', [MarketPriceController::class, 'edit'])
        ->name('market-prices.edit');

    Route::put('/market-prices/{marketPrice}', [MarketPriceController::class, 'update'])
        ->name('market-prices.update');

    Route::delete('/market-prices/{marketPrice}', [MarketPriceController::class, 'destroy'])
        ->name('market-prices.destroy');
});

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/

Route::post('/create-post', [PostController::class, 'createPost'])
    ->middleware('auth')
    ->name('posts.store');

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen'])
    ->middleware('auth')
    ->name('posts.edit');

Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])
    ->middleware('auth')
    ->name('posts.update');

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])
    ->middleware('auth')
    ->name('posts.destroy');