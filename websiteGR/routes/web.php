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

Route::get('/', function () {
    return view('posts');
});

Route::get('/entry', function () {
    return view('entry');
});

Route::get('/registration', function () {
    return  view('registration');
});


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