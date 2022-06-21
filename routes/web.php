<?php

use App\Http\Controllers\AuthorController;
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

Route::get('/author_list',[AuthorController::class,'author_list'])->name('author_list');
Route::get('/author_one/{id}',[AuthorController::class,'author_one'])->name('author_one');
Route::post('/author_one/{id}',[AuthorController::class,'author_image_download'])->name('author_image_download');
Route::post('/author_one/{id}/upload',[AuthorController::class,'second_way_upload'])->name('second_way_upload');
Route::post('/author/{id}/avatar/delete',[AuthorController::class,'author_avatar_delete'])->name('author_avatar_delete');


Route::get('/author/post/{id}',[PostController::class,'post_one'])->name('post_one');
Route::post('/author/post/{id}',[PostController::class,'post_images_upload'])->name('post_images_upload');
Route::post('/author/post/{id}/image/delete',[PostController::class,'post_images_delete'])->name('post_images_delete');



Route::get('/file', [PostController::class,'get_js'])->name('get');
Route::post('/store', [PostController::class,'store_js'])->name('store');

Route::get('/image',[ImageController::class,'view'])->name('image_train');
Route::get('/image/{id}',[ImageController::class,'image_id'])->name('image_id');
Route::post('/store/image', [ImageController::class,'store_js'])->name('store_image');
Route::post('/store/author', [AuthorController::class,'store_js'])->name('store_author');
