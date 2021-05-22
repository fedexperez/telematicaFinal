<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::post('/school/save', 'App\Http\Controllers\SchoolController@save')->name('school.save');

Route::post('/school/stats', 'App\Http\Controllers\EmailController@stats')->name('mail.stats');

//Auth routes
Auth::routes();

//Language
Route::get('lang/{lang}', 'App\Http\Controllers\LanguageController@swap')->name('lang.swap');


