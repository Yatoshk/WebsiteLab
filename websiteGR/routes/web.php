<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
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

//Route::get('/posts', 'App\Http\Controllers\MainController@posts')->name('posts');//поменял

Route::get('/', [MainController::class, 'entry'])->name('entry');
Route::get('/entry', [MainController::class, 'entry'])->name('entry');
Route::post('/entry/check', [MainController::class, 'entry_check']);

Route::get('/registration', [MainController::class, 'registration'])->middleware('guest');
Route::post('/registration/check', [MainController::class, 'registration_check'])->middleware('guest');

// Route::get('/posts-create', function () {
//     return "Posts create";
// });

Route::get('/posts-create', 'App\Http\Controllers\MainController@posts_create');//поправить

Route::post('/posts-create/check', 'App\Http\Controllers\MainController@posts_create_check');

// Route::get('/account', [AccountController::class, 'index'])->middleware('auth');

Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account.index');

Route::post('/account/update', [AccountController::class, 'update'])->middleware('auth');

Route::post('/upload-avatar', [AccountController::class, 'uploadAvatar'])->middleware('auth');

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

//пример использование динамическим параметров
//Route::get('/account/{id}/{name}', function ($id, $name) {
//    return "Id: ". $id ." name: ". $name;
//});

//Route::get('/account-admin', function () {
//    return "Admins account";
//});


Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/upload-img', [PostController::class, 'uploadImg'])->middleware('auth');

Route::get('/post_page/{id}', [PostController::class, 'pagePost'])->middleware('auth')->name('post_page');

Route::post('/comment_check', [PostController::class, 'commentCheck'])->name('comment.check');

// Route::get('/posts/my', [PostController::class, 'myPosts'])->name('posts.my');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
