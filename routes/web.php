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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'cliente'], function () use ($router){
    $router->get("/", ['as' => 'cliente.lista', 'uses' => 'ClienteController@index'] );
    $router->post("/" , ['as' => 'cliente.salvar', 'uses' => 'ClienteController@store']);
    $router->get("/{id}", ['as' => 'cliente.mostrar', 'uses' => 'ClienteController@show']);
    $router->put("/{id}", ['as' => 'cliente.atualizar', 'uses' => 'ClienteController@update']);
    $router->delete("/{id}", ['as' => 'cliente.remover', 'uses' => 'ClienteController@delete']);
});
