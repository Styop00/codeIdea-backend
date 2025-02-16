<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


Route::resources([
    'articles'   => ArticleController::class,
    'categories' => CategoryController::class,
    'users'      => UserController::class,
    'portfolio'  => PortfolioController::class,
    "jobs"       => JobController::class,
    "feedbacks"  => FeedbackController::class,
]);
Route::post("/mail", ContactController::class);
Route::post('jobs/apply/{id}', [JobController::class, "apply"]);
Route::get('random/{id}', [ArticleController::class, 'getRandomArticles']);

