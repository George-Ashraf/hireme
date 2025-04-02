<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

// Enable email verification routes
// Since you're using Breeze, this might not be necessary,
// Auth::routes(['verify' => true]);  // Not required with Breeze

// Display the home page with all active job listings
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [HomeController::class, 'about'])->name('about');

// Profile Management Routes
Route::middleware('auth', 'verified')->group(function () {
    // Show profile edit form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Update user profile information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Delete user account
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Protected Post Management Routes (Create, Update, Delete)
Route::middleware('auth', 'verified')->group(function () {
    Route::resource('post', PostController::class)->except(['index', 'show']);
});
Route::get('downloadresume', [ProfileController::class, 'download'])->name('resume.download');

// Public Post Routes (View Only)
Route::resource('post', PostController::class)->only(['index', 'show']);

// Display posts pending approval (Admin/Moderator)
Route::middleware(['auth', 'verified'])->get('pendingposts', [PostController::class, 'pending'])->name('pending.index');
// Show logged-in user's posts
Route::middleware(['auth', 'verified'])->get('myposts', [PostController::class, 'myposts'])->name('myposts.index');

// Toggle post status (active/inactive)
Route::middleware(['auth', 'verified'])->get('status/{id}', [PostController::class, 'status'])->name('posts.status');
// Toggle application status (pending/Accepted)
Route::middleware(['auth', 'verified'])->post('status/application/{id}', [ApplicationController::class, 'status'])->name('application.status');
// Search functionality for posts
Route::get('/search', [PostController::class, 'search'])->name('post.search');

// Comment Management Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Store new comment
    Route::post('/posts/{post}/comments', [CommentController::class, "store"])->name("comment.store");
    // Edit comment form
    Route::get('/posts/{post}/comments/{comment}', [CommentController::class, "edit"])->name("comment.edit");
    // Update existing comment
    Route::put('/posts/{post}/comments/{comment}', [CommentController::class, "update"])->name("comment.update");
    // Delete comment
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, "destroy"])->name("comment.destroy");
});

// Job Application Routes (All require authentication)
Route::middleware(['auth', 'verified'])->resource('application', ApplicationController::class);
Route::middleware(['auth', 'verified'])->get('myapplications', [ApplicationController::class, 'myapplications'])->name('myapplications.index');

// Category Management Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Show category creation form
    Route::get('createcategory', [CategoryController::class, 'create'])->name('category.create');
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
});

// Contact Message Routes
Route::get('contact-message', [MessageController::class, 'create'])->name('contact.create');
Route::post('contact', [MessageController::class, 'store'])->name('contact.store');
