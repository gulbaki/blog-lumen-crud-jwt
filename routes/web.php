<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// API route group
$router->group(['prefix' => 'api',
], function () use ($router) {

    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');

});

// API route group
$router->group(['prefix' => 'api',
    'middleware' => 'auth'], function () use ($router) {

    $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');

    $router->get('/blogs', 'BlogController@index');
    $router->post('/blog', 'BlogController@create');
    $router->get('/blog/{id}', 'BlogController@show');
    $router->put('/blog/{id}', 'BlogController@update');
    $router->delete('/blog/{id}', 'BlogController@destroy');

});
