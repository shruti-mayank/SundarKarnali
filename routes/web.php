<?php

use App\Http\Controllers\user\FrontController;
use App\Http\Controllers\user\NewsController;
  
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

Auth::routes();

Route::get('/system', 'HomeController@index')->name('admin');

Route::get('/', 'FrontController@index')->name('home');

Route::get('/news', 'FrontController@news')->name('news');

Route::get('/newslist', 'FrontController@newslist')->name('newslist');

Route::get('/newslist/{name}', 'FrontController@newslist')->name('front.newslist');

Route::get('/hashtags', 'FrontController@hashtag')->name('hashtag');

Route::post('/review', 'FrontController@storereview')->name('storereview');

Route::get('/searchnews', 'FrontController@searchnews')->name('search');

Route::resource('/adminnews', 'NewsController');

Route::get('/addnews', 'NewsController@category')->name('addnews');

Route::get('/addnews/subcategory/{id}','NewsController@subcategory')->name('subcategory');

Route::post('ckeditor/image_upload', 'NewsController@upload')->name('upload');

Route::post('/adminnews/updatenews/{id}','NewsController@update')->name('updatenews');

Route::get('/reviews','NewsController@review')->name('review');

Route::get('/deletereview/{id}','NewsController@deletereview')->name('deletereview');

Route::get('/news/{id}', 'FrontController@shownews')->name('front.news');

Route::get('/join', 'FrontController@join');