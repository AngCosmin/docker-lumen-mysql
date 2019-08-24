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

$router->get('/', "ExampleController@index");

$router->post('/auth', "AuthController@authenticate");

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/secret', 'ExampleController@secret');
});
