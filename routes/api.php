<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

Route::resources([
    'articles' => ArticleController::class,
    'users' => UserController::class,
]);

Route::get('random/{id}', [ArticleController::class, 'get_random_articles']);