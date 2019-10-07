<?php

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

// Route::get('/table', function () {
//     return view('layout.tables');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', function () {
        return view('layout.default');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
