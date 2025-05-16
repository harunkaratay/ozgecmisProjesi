<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

//default
Route::get('/', function () {
    return view('hosgeldiniz');
});


//home route

Route::get('/home', [HomeController::class, 'indexBlog'])->name('blogIndex');
Route::get('/home/blog/show/{id}', [HomeController::class, 'showBlog'])->name('blogShow');
//login route
Route::get('/admin', function () {
    return view('auth.login');
});


//admin görür
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blog/index', [BlogController::class, 'indexPage'])->name('blogIndex');
    Route::get('/admin/blog/create', [BlogController::class, 'createPage'])->name('blogCreate');
    Route::post('/admin/blog/add', [BlogController::class, 'addPage'])->name('blogAdd');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'deletePage'])->name('blogDelete');
});
