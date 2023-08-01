<?php


// cette façon de faire peut etre optimer que de faire a chaque controller un use 
namespace App\Http\Controllers;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PostController;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('a-propos-de-nous', [HomeController::class, 'apropos'])->name('apropos');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('service', [HomeController::class, 'service'])->name('service');
Route::get('info', [HomeController::class, 'info'])->name('info');
// route pour les resources c'est-à-dire la table crub
Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('posts', PostController::class)->names("posts");
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
