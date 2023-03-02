<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;


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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','auth'
])->group(function () {
    Route::get('/dashboard', function () {
        $posts=Post::orderBy("created_at","desc")->with("user")->paginate(15);
        return view('dashboard',compact("posts"));
    })->name('dashboard');
    Route::get('/create-new-post',      function(){
        return view("create_new_post");
    
    })->name("create-new-post");
     Route::post('/store-new-post',      function(Request $request){

    $request->validate([
            'title' => ['required', 'max:255'],
            'content' => 'required',
        ]);

        // echo $request->post();
        Post::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "user_id"=>Auth::id()
    ]);
        return redirect()->route('dashboard');
    
    })->name("store-new-post");




});

Route::middleware(['auth'])->group(function () {
    // ...

//  post
Route::get('/posts',                [PostController::class, 'index'])->name("post.index")->middleware("auth");
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
// user
Route::resource('user', UserController::class);

});

// Route::group(['middleware' => ['auth']], function () {
//     return redirect("/login");
// });

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth-google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('test');