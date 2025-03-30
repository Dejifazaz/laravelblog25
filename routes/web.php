<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| that contains the "web" middleware group. Now create something great!
|--------------------------------------------------------------------------
*/

// 🏠 Home & Static Pages
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'submitContact'])->name('contact.submit');

// 📝 Blog Routes
Route::resource('/blog', PostsController::class);

// 💬 Comments (Protected by Auth Middleware)
Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

// 🔑 Authentication Routes (Only Once)
Auth::routes();

// 🏡 Dashboard (Home)
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/blog/{slug}', [PostsController::class, 'show'])->name('posts.show');
