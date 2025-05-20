<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

//default
Route::get('/', function () {
    return view('hosgeldiniz');
});


//public route
Route::get('/home', [HomeController::class, 'indexBlog'])->name('blogIndex');
Route::get('/home/blog/show/{id}', [HomeController::class, 'showBlog'])->name('blogShow');

//login route
Route::get('/admin', function () {
    return view('auth.login');
});


//logout route
Route::get('/cikis', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');

//yorum routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/admin/comments', [CommentController::class, 'index'])->name('commentsIndex');
Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');


//admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blog/index', [BlogController::class, 'indexPage'])->name('blogIndex');
    Route::get('/admin/blog/show/{id}', [BlogController::class, 'showBlog'])->name('showBlog');
    Route::get('/admin/blog/create', [BlogController::class, 'createPage'])->name('blogCreate');
    Route::post('/admin/blog/add', [BlogController::class, 'addPage'])->name('blogAdd');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'deletePage'])->name('blogDelete');
});


//profil routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
});
