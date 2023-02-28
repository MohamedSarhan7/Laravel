<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("welcome");
});
// Route::get('/posts/create', function () {
//     return view("post.create");
// });

//  post
Route::get('/posts',                [PostController::class, 'index'])->name("post.index");
Route::get('/posts/create',         [PostController::class, 'create'])->name("post.create");

Route::get('/posts/{post}',         [PostController::class, 'show'])->name("post.show");

Route::post('/posts/store',         [PostController::class, 'store'])->name("post.store");


Route::get('/posts/edit/{post}',    [PostController::class, 'edit'])->name("post.edit");

Route::put('/posts/update/{post}',  [PostController::class, 'update'])->name("post.update");

Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name("post.delete");


//  comment

Route::get('/comments',                [CommentController::class, 'index'])->name("comment.index");
Route::get('/comments/create',         [CommentController::class, 'create'])->name("comment.create");
Route::post('/comments/store',         [CommentController::class, 'store'])->name("comment.store");

Route::get('/comments/{comment}',         [CommentController::class, 'show'])->name("comment.show");



Route::get('/comments/edit/{comment}',    [CommentController::class, 'edit'])->name("comment.edit");

Route::put('/comment/update/{comment}',  [CommentController::class, 'update'])->name("comment.update");

Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name("comment.delete");


Route::resource('user', UserController::class);
