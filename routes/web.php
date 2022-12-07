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

Route::get('/', 'WebsiteController@home');
Route::get('formtopup', 'WebsiteController@formtopup');
Route::get('invoice', 'WebsiteController@invoice');
Route::get('detail', 'WebsiteController@milos');
