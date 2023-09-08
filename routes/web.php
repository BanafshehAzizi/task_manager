<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Web\Users\AuthController::class, 'login'])->name('view-login');
Route::get('/register', [\App\Http\Controllers\Web\Users\UserController::class, 'register'])->name('view-register');
Route::post('/logout', [\App\Http\Controllers\Web\Users\AuthController::class, 'logout'])->name('view-logout');
