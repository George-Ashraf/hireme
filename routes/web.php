<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;


require __DIR__.'/auth.php';

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
 


route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
Route::resource('post', PostController::class)->middleware('auth');

Route::post('/posts/{post}/comments',  [CommentController::class,"store"])->name("comment.store")->middleware('auth');






route::get('craetecategory',[CategoryController::class,'create'])->name('category.create');
route::post('storecategory',[CategoryController::class,'store'])->name('category.store');
route::get('editcategory/{id}',[CategoryController::class,'edit'])->name('category.edit');
route::post('updatecategory/{id}',[CategoryController::class,'update'])->name('category.update');
route::get('deletecategory/{id}',[CategoryController::class,'destroy'])->name('category.delete');