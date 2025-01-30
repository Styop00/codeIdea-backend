<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;


Route::resources([
    'articles' => ArticleController::class,
    'users' => UserController::class,
    'portfolio' => PortfolioController::class,
]);
Route::post("/mail",ContactController::class);
Route::get('random/{id}', [ArticleController::class, 'get_random_articles']);

