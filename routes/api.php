<?php

use App\Mail\ContactCompanyMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;


Route::resources([
    'articles' => ArticleController::class,
    'users' => UserController::class,
    'portfolio' => PortfolioController::class,
    'mail'=>ContactCompanyMail::class,
]);
