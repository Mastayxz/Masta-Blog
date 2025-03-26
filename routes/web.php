<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $posts = \App\Models\Post::latest()->take(6)->get();
    return view('home', compact('posts'));
})->name('home');

Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/{slug}', [PostController::class, 'publicShow'])->name('posts.show.public');
Route::get('/posts', [PostController::class, 'publicIndex'])->name('posts.index.public');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.posts');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/ads', [AdsController::class, 'index'])->name('ads.index');
    Route::post('/ads', [AdsController::class, 'store'])->name('ads.store');

});
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{slug}', [PostController::class, 'delete'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
