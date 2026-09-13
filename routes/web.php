<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::middleware(['auth'])->group(function () {
    // Feed e Posts
    Route::get('/forum', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');

    // Comentários
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Comunidades
    Route::get('/comunidades', [CommunityController::class, 'index'])->name('communities.index');
    Route::get('/comunidades/{community}', [CommunityController::class, 'show'])->name('communities.show');

    // Configurações
    Route::get('/configuracoes', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/configuracoes', [SettingsController::class, 'update'])->name('settings.update');
});