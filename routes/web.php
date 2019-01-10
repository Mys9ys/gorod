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

// страницы
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting', 'SettingController@index')->name('setting');
Route::get('/country', 'PageCountryCntrlr@index')->name('country');
Route::get('/company', 'PageCompanyCntrlr@index')->name('company');
Route::get('/company_detail', 'PageCompanyDetail@index')->name('company_detail');
Route::get('/human_detail', 'PageHumanDetail@index')->name('human_detail');
Route::get('/human', 'PageHumanCntrlr@index')->name('human');
Route::get('/map', 'PageMapCntrlr@index')->name('map');

//Route::post('/ajaxRequest', 'Ajax\AjaxController@send');

Route::post('/ajaxCalendar', 'Ajax\AjaxCalendar@send'); // работа с календарем
Route::post('/reset', 'Ajax\Reset@reset'); // сброс всех данных
Route::post('/addHuman', 'Ajax\addHuman@add'); // добавление человечков
Route::post('/companyLibGet', 'Ajax\companyLib@get'); // получение списка
Route::post('/companyLibSet', 'Ajax\companyLib@set'); // установка компании в библиотеку
Route::post('/companyLibUpdate', 'Ajax\companyLib@update'); // установка компании в библиотеку
Route::post('/companyLibDelete', 'Ajax\companyLib@delete'); // установка компании в библиотеку

// платежи аякс
Route::post('/paysOTO', 'Ajax\Pays@PayOneToOne'); // один-один
Route::post('/paysMTO', 'Ajax\Pays@PayManyToOne'); // много одному
Route::post('/paysOTM', 'Ajax\Pays@PayOneToMany'); // один многим
Route::post('/addMoneyTreasury', 'Ajax\Pays@addMoneyTreasury'); // казна

Route::post('/getHumanCountry', 'Ajax\getHumanCountry@request'); // выбрать всех жителей страны
Route::post('/getCityCountry', 'Ajax\getCityCountry@request'); // выбрать всех жителей страны

Route::post('/setCountry', 'Ajax\setInfo@addCountry'); // создание государства
Route::post('/getCompanySector', 'Ajax\AjaxCompany@getSector'); // запрос секторов экономики и шаблонов компаний
Route::post('/addNewCompany', 'Ajax\AjaxCompany@addNewCompany'); // сохранение новой компании
