<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

// Display the home page with all active job listings
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile Management Routes
Route::middleware('auth')->group(function () {
    // Show profile edit form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Update user profile information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Delete user account
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Protected Post Management Routes (Create, Update, Delete)
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class)->except(['index', 'show']);
});
Route::get('downloadresume', [ProfileController::class, 'download'])->name('resume.download');

// Public Post Routes (View Only)
Route::resource('post', PostController::class)->only(['index', 'show']);

// Display posts pending approval (Admin/Moderator)
Route::get('pendingposts', [PostController::class, 'pending'])->name('pending.index');
// Show logged-in user's posts
Route::get('myposts', [PostController::class, 'myposts'])->name('myposts.index');

// Toggle post status (active/inactive)
Route::get('status/{id}', [PostController::class, 'status'])->name('posts.status');
// Toggle application status (pending/Accepted)
Route::post('status/application/{id}', [ApplicationController::class, 'status'])->name('application.status');
// Search functionality for posts
Route::get('/search', [PostController::class, 'search'])->name('post.search');

// Comment Management Routes
// Store new comment
Route::post('/posts/{post}/comments', [CommentController::class, "store"])->name("comment.store")->middleware('auth');
// Edit comment form
Route::get('/posts/{post}/comments/{comment}', [CommentController::class, "edit"])->name("comment.edit")->middleware('auth');
// Update existing comment
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, "update"])->name("comment.update")->middleware('auth');
// Delete comment
Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, "destroy"])->name("comment.destroy")->middleware('auth');

// Job Application Routes (All require authentication)
Route::resource('application', ApplicationController::class)->middleware('auth');
Route::get('myapplications', [ApplicationController::class, 'myapplications'])->name('myapplications.index');

// Category Management Routes
// Show category creation form
Route::get('craetecategory', [CategoryController::class, 'create'])->name('category.create');
// Display posts in specific category
Route::get('showpostofcategory/{id}', [CategoryController::class, 'show'])->name('category.show');
// Store new category
Route::post('storecategory', [CategoryController::class, 'store'])->name('category.store');
// Show category edit form
Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
// Update existing category
Route::post('updatecategory/{id}', [CategoryController::class, 'update'])->name('category.update');
// Delete category
Route::get('deletecategory/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
