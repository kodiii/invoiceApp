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

Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
Route::post('/invoices', 'InvoiceController@store');
Route::get('/invoices/create', 'InvoiceController@create');
Route::get('/invoices/{invoice}', 'InvoiceController@show')->name('invoices.show');
Route::get('/invoices/{invoice}/edit', 'InvoiceController@edit');
Route::put('/invoices/{invoice}', 'InvoiceController@update');

Route::get('/invoices/create', 'ItemController@create');

Route::get('/invoices/create', 'ClientController@create');

Route::get('/invoices/create', 'StatusController@create');

