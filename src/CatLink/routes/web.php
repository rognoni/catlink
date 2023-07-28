<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;

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
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginSubmit']);
    Route::get('/register/{token}', [LoginController::class, 'register'])->name('register');
    Route::post('/register/{token}', [LoginController::class, 'registerSubmit']);
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

    Route::get('/guide/category', function () {
        return view('guide.category');
    })->name('guide_category');
});

Route::prefix('CatLink')->middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/user', [LinkController::class, 'user'])->name('user');
    Route::get('/link_add', [LinkController::class, 'add'])->name('link_add');
    Route::post('/link_add', [LinkController::class, 'addSubmit']);
});

Route::prefix('CatLink/admin')->middleware(['auth', 'role:admin'])->group(function () {
    /*Route::get('/home', function () {
        return "TODO admin";
    })->name('admin_home');*/
    Route::get('/home', [AdminController::class, 'home'])->name('admin_home');
    Route::get('/editor', [AdminController::class, 'editor'])->name('admin_editor');
    Route::post('/editor', [AdminController::class, 'editorSubmit']);
});
