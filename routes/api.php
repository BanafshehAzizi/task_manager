<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/v1'], function () {
    Route::post('/register', [App\Http\Controllers\Users\UserController::class, 'register'])->name('register');
    Route::post('/login', [App\Http\Controllers\Users\AuthController::class, 'login'])->name('login');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/logout', [App\Http\Controllers\Users\AuthController::class, 'logout'])->name('logout');

        Route::group(['prefix' => '/articles'], function () {
            Route::get('/', [App\Http\Controllers\Articles\ArticleController::class, 'list'])->name('show_articles');
            Route::get('/{article_id}', [App\Http\Controllers\Articles\ArticleController::class, 'show'])->name('show_article');
            Route::post('/', [App\Http\Controllers\Articles\ArticleController::class, 'insert'])->name('insert_article')->middleware(['check_user_event:1']);
            Route::delete('/{article_id}', [App\Http\Controllers\Articles\ArticleController::class, 'delete'])->name('delete_article');
//            Route::put('/{article_id}', [App\Http\Controllers\Articles\ArticleController::class, 'update'])->name('update_article');
        });

        Route::group(['prefix' => '/files'], function () {
            Route::post('/', [App\Http\Controllers\Files\FileController::class, 'insert'])->name('insert_file')->middleware(['check_user_event:2']);
            Route::delete('/{token}', [App\Http\Controllers\Files\FileController::class, 'delete'])->name('delete_file');
        });
    });
});
