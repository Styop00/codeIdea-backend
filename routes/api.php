<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;


Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::post('/', [ArticleController::class, 'create']);
    Route::put('/{article_id}', [ArticleController::class, 'update']);
    Route::delete('/{article_id}', [ArticleController::class, 'delete']);
});
Route::group(['prefix'=>'portfolio'],function(){
    Route::get('/',[PortfolioController::class,'index']);
    Route::post('/',[PortfolioController::class,'create']);
    Route::get('/{portfolio_id}',[PortfolioController::class,'find']);
    Route::put('/{portfolio_id}',[PortfolioController::class,"update"]);
    Route::delete('/{portfolio_id}',[PortfolioController::class,'delete']);
});
