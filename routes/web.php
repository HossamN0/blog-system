<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (PostController $postController) {
    $posts = $postController->index();
    return view('welcome', compact('posts'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-post', [PostController::class, 'postForm'])->name('posts.form');
    Route::post('/create-post', [PostController::class, 'create'])->name('posts.create');
});

Route::get('posts', [PostController::class, 'index']);

require __DIR__ . '/auth.php';
