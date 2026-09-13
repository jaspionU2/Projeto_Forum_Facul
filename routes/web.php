<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Públicas & Autenticação
|--------------------------------------------------------------------------
*/

// Redireciona a raiz para a página de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Exibe o formulário de login
Route::get('/login', [LoginController::class, 'create'])->name('login');

// Processa a tentativa de login
Route::post('/login', [LoginController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Área Protegida (Fórum / Rede Social)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Feed Principal e Gestão de Posts
    Route::get('/forum', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Toggle de Curtidas
    Route::post('/posts/{post}/like', [LikeController::class, 'togglePostLike'])->name('posts.like');

    // Comentários (Alinhado ao CommentController e Form)
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Rota de Configurações (Ajuste para a Sidebar)
    Route::get('/settings', function () {
        return redirect()->route('posts.index');
    })->name('settings');

    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});