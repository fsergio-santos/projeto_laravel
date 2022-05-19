<?php

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

Route::post("/login", 'Auth\AuthController@login');

Route::middleware('auth:api')->post("/logout", 'Auth\AuthController@logout');

Route::middleware('cors')->group(function(){

    Route::get('/autor/listar','Api\AuthorController@index');
    Route::get('/autor/buscar/{id}','Api\AuthorController@search');
    Route::post('/autor/salvar','Api\AuthorController@create');
    Route::put('/autor/update/{id}','Api\AuthorController@update');
    Route::delete('/autor/delete/{id}','Api\AuthorController@delete');
});

Route::middleware('auth:api')->get('/editora/listar','Api\EditoraController@index');

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */



