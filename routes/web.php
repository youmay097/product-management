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
//Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));
Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');
//Route::get('downloadExcel/{type}', 'PdfGenerateController@downloadExcel');
Route::resource('client','ClientController');
Route::resource('product','ProductController');
Route::resource('category','CategoryController');