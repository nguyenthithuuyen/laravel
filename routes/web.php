<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login',[AuthController::class,'showFormLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('/',[HomeController::class,'index']);
Route::get('posts/{id}/detail',[HomeController::class,'showDetailPost'])->name('showDetailPost');

Route::middleware('auth')->prefix('admin')->group(function (){
    Route::prefix('posts')->group(function (){
        Route::get('create',[PostController::class,'create'])->name('posts.create');
        Route::post('create',[PostController::class,'store'])->name('posts.store');
        Route::get('/',[PostController::class,'showList'])->name('posts.showList');
        Route::get('{id}/delete',[PostController::class,'delete'])->name('posts.delete');
        Route::get('{id}/edit',[PostController::class,'update'])->name('posts.update');
        Route::post('{id}/edit',[PostController::class,'edit'])->name('posts.edit');
        Route::get('/search',[PostController::class,'search'])->name('posts.search');

    });

    Route::prefix('users')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('user.index');
        Route::get('/create',[UserController::class,'create'])->name('user.create');
        Route::post('/create',[UserController::class,'store'])->name('user.store');
        Route::get('/{id}/delete',[UserController::class,'delete'])->name('user.delete');
        Route::get('/{id}/edit',[UserController::class,'update'])->name('user.update');
        Route::post('/{id}/edit',[UserController::class,'edit'])->name('user.edit');
        Route::get('/search',[UserController::class,'search'])->name('user.search');

    });
    Route::get('/dashboard', function (){
        return view('dashboard');
    });


//
//    Route::prefix('categories')->group(function (){
//        Route::get('/',[CategoryController::class,'index'])->name('category.index');
//    });


});
