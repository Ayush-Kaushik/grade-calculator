<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorControler;
use App\Http\Controllers\HomeController;

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

Route::get('/', 'HomeController@index');
Route::post('/home','HomeController@new');
Route::get('/calculator','CalculatorController@index');
Route::post('/calculator','CalculatorController@addEntry');

Route::resource('home', 'HomeController');
Route::resource('calculator', 'CalculatorController');
