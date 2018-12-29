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

Route::get('/', 'PageController@home');
Route::get('portfolio', 'PageController@portfolio');
Route::get('commission', 'PageController@commission');
Route::get('contact', 'PageController@contact');
Route::get('faq', 'PageController@faq');
Route::get('tos', 'PageController@tos');
Route::get('pricing', 'PageController@pricing');
