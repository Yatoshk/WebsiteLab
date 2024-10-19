<?php

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

Route::get('/', 'App\Http\Controllers\MainController@posts');


Route::get('/entry', 'App\Http\Controllers\MainController@entry')->name('entry');


Route::get('/registration', 'App\Http\Controllers\MainController@registration');

Route::post('/registration/check', 'App\Http\Controllers\MainController@registration_check');

Route::get('/posts-create', function () {
    return "Posts create";
});

Route::get('/account', function () {
    return "Users account";
});

//пример использование динамическим параметров
Route::get('/account/{id}/{name}', function ($id, $name) {
    return "Id: ". $id ." name: ". $name;
});

Route::get('/account-admin', function () {
    return "Admins account";
});