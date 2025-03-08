<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Ruta para el perfil del usuario, solo autenticados
Route::get('/profile', function () {
    return view('user.profile');
})->name('profile')->middleware('auth');

Route::delete('/profile/{user_id}', [AuthController::class, 'deleteUser'])->name('profile.delete')->middleware('auth');

// Rutas de los posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::post('/posts', [PostController::class, 'createPost'])->name('posts.store')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'deletePost'])->name('posts.delete')->middleware('auth');
Route::post('/posts/{id}/like', [PostController::class, 'likePost'])->name('posts.like')->middleware('auth');


// Rutas de los comentarios
Route::post('/posts/{post}/comments', [CommentController::class, 'comment'])->name('comments.store')->middleware('auth');

