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
Auth::routes();
Route::get('create', 'QuestionairController@index');
Route::post('create', 'QuestionairController@docreate');
Route::get('createquestion/{id}', 'QuestionairController@addQuestion');
Route::post('createquestion/{id}', 'QuestionairController@addQuestion');
Route::post('delChoice', 'QuestionairController@delChoice');


Route::get('/home', 'HomeController@index');


