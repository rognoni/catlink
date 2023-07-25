<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;

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

Route::prefix('/CatLink')->group(function () {
    /*Route::get('/', function () {
        return view('welcome');
    });*/    

    Route::get('/', [LinkController::class, 'links'])->name('home');
    Route::get('/links/{id}', [LinkController::class, 'detail'])->name('link_detail');
    Route::get('/search', [LinkController::class, 'search'])->name('search');
    Route::get('/categories', [LinkController::class, 'categories'])->name('categories');
    Route::get('/html{id}', [LinkController::class, 'html'])->name('html');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/cookie', function () {
        return view('cookie');
    })->name('cookie');
});
