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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/{anypath}', 'HomeController@index')->where('path','*');



Route::get('get-category','CategoryController@index');
Route::post('add-category','CategoryController@store');
Route::get('remove-category/{id}','CategoryController@destroy');
Route::get('edit-category/{slug}','CategoryController@edit');
Route::post('update-category','CategoryController@update');


Route::get('get-posts','PostController@index');


