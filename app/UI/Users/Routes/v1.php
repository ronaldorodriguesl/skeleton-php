<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(["prefix" => "auth"], function () use ($router) {
    $router->get("/register", "v1\Auth\AuthController@register");
    $router->get("/lang", "v1\Auth\AuthController@lang");
    $router->post("/login", "v1\Auth\AuthController@login");
    $router->get("/users", "v1\Auth\AuthController@users");
});
