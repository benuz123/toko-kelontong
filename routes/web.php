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

Auth::routes();

Route::group(['prefix' => 'backoffice', 'middleware' => ['auth']], function() {
    Route::get('/', 'AdminController@index')->name('backoffice');
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product/add', 'ProductController@tambah_product')->name('product-add');
    Route::post('product', 'ProductController@simpan_product')->name('product-simpan');
    Route::get('detail', 'ProductDetailController@index')->name('product-detail');
    Route::get('detail/add', 'ProductDetailController@tambah_detail')->name('product-detail-add');
    Route::post('detail', 'ProductDetailController@simpan_detail')->name('product-detail-simpan');

});
