<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('/', 'ArticleController@index');
resource('/post', 'ArticleController');
get('/post', 'ArticleController@redirect');
get('/post/my/{id}', 'ArticleController@mine');
get('/category', 'ArticleController@cat_index');
post('/category','ArticleController@cat_store');
delete('/category/{id}','ArticleController@cat_delete');
get('/category/{id}/edit','ArticleController@cat_edit');
patch('/category/{id}','ArticleController@cat_update');
get('/category/{id}','ArticleController@cat_list');

get('auth/login','Auth\AuthController@getLogin');
post('auth/login','Auth\AuthController@postLogin');
get('auth/register','Auth\AuthController@getRegister');
post('auth/register','Auth\AuthController@postRegister');

get('auth/logout','Auth\AuthController@getLogout');