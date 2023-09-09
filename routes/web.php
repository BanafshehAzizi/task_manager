<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Web\Users\AuthController::class, 'login'])->name('view-login');
Route::view('/loading', 'loading');
Route::get('/register', [\App\Http\Controllers\Web\Users\UserController::class, 'register'])->name('view-register');
//Route::get('/logout', [\App\Http\Controllers\Web\Users\AuthController::class, 'logout'])->name('view-logout');
Route::get('/dashboard', [\App\Http\Controllers\Web\Articles\ArticleController::class, 'list'])->name('dashboard');
//Route::get('/articles/{article_id?}', [\App\Http\Controllers\Web\Articles\ArticleController::class, 'insert'])->name('view-insert-article');
Route::get('/articles/', [\App\Http\Controllers\Web\Articles\ArticleController::class, 'insert'])->name('view-insert-article');
Route::get('/articles/{article_id}', [\App\Http\Controllers\Web\Articles\ArticleController::class, 'update'])->name('vie-update-article');
