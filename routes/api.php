<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::post('/user', [UserController::class, 'create']);

Route::apiResource('/post', PostController::class)->only([
  'store', 'show', 'delete'
]);
Route::post('/posting/{id}', [PostController::class, 'delete']);
Route::get('/count', [PostController::class, 'countLikes']);

Route::get('/countLikes', [LikeController::class, 'countLikes']);
Route::post('/judgeHasLike', [LikeController::class, 'judgeHasLike']);

Route::post('/commentPost', [LikeController::class, 'commentPost']);

Route::get('/showComment', [CommentController::class, 'showComment']);
Route::post('/createComment', [CommentController::class, 'createComment']);
