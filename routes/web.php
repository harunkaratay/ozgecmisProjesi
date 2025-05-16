<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

//default
Route::get('/', function () {
    return view('hosgeldiniz');
});


//home route
Route::get('/home', function () {
    return view('admin.home.cv');
});


//blog routes
Route::get('/admin/blog/index', [BlogController::class, 'indexPage'])->name('blogIndex');
Route::get('/admin/blog/show/{id}', [BlogController::class, 'showPage'])->name('blogShow');
//admin görür
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blog/create', [BlogController::class, 'createPage'])->name('blogCreate');
    Route::post('/admin/blog/add', [BlogController::class, 'addPage'])->name('blogAdd');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'deletePage'])->name('blogDelete');
});
