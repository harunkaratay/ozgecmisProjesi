<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('admin.welcome.cv');
});


//blog routes
Route::get('/admin/blog/index', [BlogController::class, 'indexPage'])->name('blogIndex');
Route::get('/admin/blog/show/{id}', [BlogController::class, 'showPage'])->name('blogShow');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blog/create', [BlogController::class, 'createPage'])->name('blogCreate');
    Route::post('/admin/blog/add', [BlogController::class, 'addPage'])->name('blogAdd');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'deletePage'])->name('blogDelete');
});
