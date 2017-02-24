<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->group(['prefix' => 'api/v1'], function($app){

  //User
  $app->get('/users/', 'UserController@index');
  $app->get('/users/{id}', 'UserController@show');

  $app->delete('/users/{id}' , 'UserController@destroy');

});

