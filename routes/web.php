<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post', PostController::class);

require __DIR__.'/auth.php';





route::get('craetecategory',[CategoryController::class,'create'])->name('category.create');
route::post('storecategory',[CategoryController::class,'store'])->name('category.store');
route::get('editcategory/{id}',[CategoryController::class,'edit'])->name('category.edit');
route::post('updatecategory/{id}',[CategoryController::class,'update'])->name('category.update');
route::get('deletecategory/{id}',[CategoryController::class,'destroy'])->name('category.delete');