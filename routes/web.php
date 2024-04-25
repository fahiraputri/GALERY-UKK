<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\CommentController;
use App\Models\GallaryImage;


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
    $data = GallaryImage::all();
    return view('welcome', compact('data'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/image-store', [ImageController::class, 'storeImage'])->name('image-store');
Route::resource('images', ImgController::class);
Route::get('/detailImage/{image}', [App\Http\Controllers\ImgController::class, 'detailImage'])->name('detail');
// Route::get('/coments', [ComentController::class, 'detail'])->name('welcome');
Route::get('/posts/{postId}/comments', [CommentController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
