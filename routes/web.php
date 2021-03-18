<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bo', function () {
    return view('pages.bo');
});
Route::resource('avatars', AvatarController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategorieController::class);
Route::resource('images', ImageController::class);

Route::get('/download/{id}', [ImageController::class,'download']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

