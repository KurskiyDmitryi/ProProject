<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
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
})->name('home');

Route::controller(UserController::class)->group(function () {
    Route::get('/user_list', [UserController::class, 'user_list'])->name('user_list');
    Route::get('/user_one/{id}', [UserController::class, 'user_one'])->name('user_one');
    Route::post('/user_one/{id}', [UserController::class, 'user_image_download'])->name('user_image_download');
    Route::post('/user_one/{id}/upload', [UserController::class, 'second_way_upload'])->name('second_way_upload');
    Route::post('/user/{id}/avatar/delete', [UserController::class, 'user_avatar_delete'])->name('user_avatar_delete');
});

Route::get('/login',[LoginController::class,'login_form'])->name('login');
Route::get('/login/registration',[LoginController::class,'registration_form'])->name('registration_form');
Route::post('/login/registration',[LoginController::class,'registration_process'])->name('registration_process');

Route::controller(PostController::class)->group(function () {
    Route::get('/user/post/{id}', [PostController::class, 'post_one'])->name('post_one');
    Route::post('/user/post/{id}', [PostController::class, 'post_images_upload'])->name('post_images_upload');
    Route::post('/user/post/{id}/image/delete', [PostController::class, 'post_images_delete'])->name('post_images_delete');
    Route::get('/file', [PostController::class, 'get_js'])->name('get');
    Route::post('/store', [PostController::class, 'store_js'])->name('store');
});







Route::get('/image', [ImageController::class, 'view'])->name('image_train');
Route::get('/image/{id}', [ImageController::class, 'image_id'])->name('image_id');
Route::post('/store/image', [ImageController::class, 'store_js'])->name('store_image');
Route::post('/store/user', [UserController::class, 'store_js'])->name('store_user');
