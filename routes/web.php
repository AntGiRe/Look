<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//feed de usuario, si no esta autenticado no puede verlo y lo redirige al login
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');


Route::post('/image', [ImageController::class, 'store'])->name('image.store');


Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');