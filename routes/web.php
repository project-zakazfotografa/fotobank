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

Route::get('/', 'PagesController@index')->name('main');

Route::get('/photograph/info', 'HomeController@personalInfo')->name('photograph.info');
Route::post('/photograph/save', 'HomeController@storeUserInfo')->name('photograph.save');
Route::get('/photograph/tags', 'HomeController@tags');
Route::post('/photograph/attach-tag', 'HomeController@attachTagUser');
Route::get('/photograph/servises', 'HomeController@showServises');
Route::post('/photograph/add-servises', 'HomeController@storeServises');
Route::get('/photograph/filters', 'PagesController@filters');


Route::get('/photograph/{id}', 'PagesController@showPhotograph');

Route::resource('/photo', 'PhotoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', 'PagesController@test');

// CMS routes

Route::get('/cms/login', 'Cms\CmsController@enter');
Route::get('/cms/main', 'Cms\CmsController@cmsMain');
Route::get('/cms/main/bullets', 'PagesController@bullets');
Route::get('/cms/main/tags', 'PagesController@tags');
Route::get('/cms/main/photographs', 'PagesController@photographs');
Route::post('/cms/main/add-bullet', 'PagesController@addBullet');
Route::post('/cms/main/add-tag', 'PagesController@addTag');
