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

get('auth/login','Auth\AuthController@getLogin');
post('auth/login','Auth\AuthController@postLogin');
get('auth/register','Auth\AuthController@getRegister');
post('auth/register','Auth\AuthController@postRegister');

get('auth/logout','Auth\AuthController@getLogout');