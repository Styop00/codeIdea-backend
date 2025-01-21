<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::post('/', [ArticleController::class, 'create']);
    Route::put('/{article_id}', [ArticleController::class, 'update']);
    Route::delete('/{article_id}', [ArticleController::class, 'delete']);
});