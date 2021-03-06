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

Route::resource('commissions', 'CommissionController');

Route::get('contact', 'ContactController@show');
Route::post('contact/submit', 'ContactController@submit');

Route::get('faq', 'PageController@faq');
Route::get('tos', 'PageController@tos');
Route::get('pricing', 'PageController@pricing');

Route::get('/connect/{token}', 'DiscordController@app');
Route::get('/connected', 'DiscordController@register');
