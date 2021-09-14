<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\TagsController;

use App\Http\Controllers\PostsController;

use App\Http\Controllers\UsersController;

use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('blog/posts/{post}', [BlogController::class, 'SinglePost'])->name('blog.show');

Route::get('blog/categories/{category}',  [BlogController::class, 'category'])->name('blog.category');

Route::get('blog/tags/{tag}',  [BlogController::class, 'tag'])->name('blog.tag');



    


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    
    Route::resource('categories', CategoriesController::class);

    
    Route::resource('tags', TagsController::class);

Route::resource('posts', PostsController::class);

Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');

Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('restore-posts');  



});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');

    Route::put('users/profile', [UsersController::class, 'update'])->name('users.update-profile');


    Route::get('users', [UsersController::class, 'index'])->name('users.index');

    Route::post('users/{user}/make-admin', [UsersController::class, 'makeAdmin'])->name('users.make-admin');

});

