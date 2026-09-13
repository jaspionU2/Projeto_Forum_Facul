<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

// Rotas que exigem o usuário estar logado (middleware auth)
Route::middleware('auth')->group(function () {

    // Rotas de CRUD dos Posts (cria rotas para index, store, update, destroy automaticamente)
    Route::resource('posts', PostController::class);

    Route::resource('communities', CommunityController::class);
    Route::resource('comments', CommentController::class);

    // Rota específica para dar like num post via Vue/AJAX
    Route::post('/posts/{post}/like',
    [LikeController::class,
    'togglePostLike'])->name('posts.like');
});
