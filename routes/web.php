<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (PostController $postController) {
    $posts = $postController->index();
    return view('welcome', compact('posts'));
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-post', [PostController::class, 'postForm'])->name('posts.form');
    Route::post('/create-post', [PostController::class, 'create'])->name('posts.create');
});

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/dashboard', function (PostController $postController) {
        $posts = $postController->index();
        return view('dashboard', compact('posts'));
    })->name('dashboard');
    Route::get('/edit-post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::put('/edit-post/{id}', [PostController::class, 'update'])->name('post.edit');
    Route::delete('/delete-post/{id}', [PostController::class, 'destroy'])->name('post.delete');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('category.create');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/edit-category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::put('/edit-category/{id}', [CategoryController::class, 'update'])->name('category.edit');
});

// Route::get('posts', [PostController::class, 'index']);

require __DIR__ . '/auth.php';
