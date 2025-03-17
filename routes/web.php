<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class)->except(['index', 'show']);
});
Route::resource('post', PostController::class)->only(['index', 'show']);

Route::get('pendingposts', [PostController::class, 'pending'])->name('pending.index');
Route::get('myposts', [PostController::class, 'myposts'])->name('myposts.index');
Route::get('status/{id}', [PostController::class, 'status'])->name('posts.status');
Route::get('/search', [PostController::class, 'search'])->name('post.search');

Route::post('/posts/{post}/comments', [CommentController::class, "store"])->name("comment.store")->middleware('auth');
Route::get('/posts/{post}/comments/{comment}', [CommentController::class, "edit"])->name("comment.edit")->middleware('auth');
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, "update"])->name("comment.update")->middleware('auth');
Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, "destroy"])->name("comment.destroy")->middleware('auth');

Route::resource('application', ApplicationController::class)->middleware('auth');

route::get('craetecategory', [CategoryController::class, 'create'])->name('category.create');
route::get('showpostofcategory/{id}', [CategoryController::class, 'show'])->name('category.show');
route::post('storecategory', [CategoryController::class, 'store'])->name('category.store');
route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
route::post('updatecategory/{id}', [CategoryController::class, 'update'])->name('category.update');
route::get('deletecategory/{id}', [CategoryController::class, 'destroy'])->name('category.delete');