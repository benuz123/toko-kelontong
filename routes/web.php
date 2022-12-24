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
Route::get('formtopup/{slug}', 'WebsiteController@formtopup');
Route::get('invoice/{invoice_id}', 'WebsiteController@invoice')->name('invoice');
Route::get('detail', 'WebsiteController@milos');
Route::get('test', 'XenditController@channel_list')->name('test');
Route::post('create-order', 'TransactionController@create_transaction')->name('create-order');
Route::post('confirm-order', 'WebsiteController@confirm_order')->name('confirm-order');
Route::post('xendit/callback', 'XenditController@callback')->name('xendit-callback');


Auth::routes();

Route::group(['prefix' => 'backoffice', 'middleware' => ['auth']], function() {
    Route::get('/', 'AdminController@index')->name('backoffice');

    //product
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product/add', 'ProductController@tambah_product')->name('product-add');
    Route::get('product/edit/{id}', 'ProductController@edit_product')->name('product-edit');
    Route::post('product', 'ProductController@simpan_product')->name('product-simpan');
    Route::put('product', 'ProductController@update_product')->name('product-update');
    Route::delete('product/hapus{id}', 'ProductController@hapus_product')->name('product-delete');

    //detail 
    Route::get('detail', 'ProductDetailController@index')->name('product-detail');
    Route::get('detail/add', 'ProductDetailController@tambah_detail')->name('product-detail-add');
    Route::get('detail/edit/{id}', 'ProductDetailController@edit_detail')->name('product-detail-edit');
    Route::post('detail', 'ProductDetailController@simpan_detail')->name('product-detail-simpan');
    Route::put('detail', 'ProductDetailController@update_detail')->name('product-detail-update');
    Route::delete('detail/hapus/{id}', 'ProductDetailController@hapus_detail')->name('product-detail-delete');

    //parameter
    Route::get('parameter', 'ParameterController@index')->name('parameter');
    Route::get('parameter/add', 'ParameterController@tambah_parameter')->name('parameter-add');
    Route::get('parameter/edit/{id}', 'ParameterController@edit_parameter')->name('parameter-edit');
    Route::post('parameter', 'ParameterController@simpan_parameter')->name('parameter-simpan');
    Route::put('parameter', 'ParameterController@update_parameter')->name('parameter-update');
    Route::delete('parameter/hapus/{id}', 'ParameterController@hapus_parameter')->name('parameter-delete');
});
