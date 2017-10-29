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


Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/ajaxRequest', 'Ajax\AjaxController@send');

Route::post('/ajaxRequest', 'Ajax\AjaxCalendar@send'); // работа с календарем
Route::post('/reset', 'Ajax\Reset@reset'); // сброс всех данных
Route::post('/addHuman', 'Ajax\addHuman@add'); // добавление человечков
Route::post('/companyLibGet', 'Ajax\companyLib@get'); // получение списка
Route::post('/companyLibSet', 'Ajax\companyLib@set'); // установка компании в библиотеку
Route::post('/companyLibDelete', 'Ajax\companyLib@delete'); // установка компании в библиотеку
