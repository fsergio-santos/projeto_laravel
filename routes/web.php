<?php


Route::get('/', 'Auth\LoginController@login');

Route::get('login', 'Auth\LoginController@login')->name('login');

Route::get('registrar', 'Auth\RegisterController@index')->name('registrar_usuario');

Route::post('registrar', 'Auth\RegisterController@registrar')->name('registrar_usuario');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('author')->group(function () {

    Route::any('/buscar', 'AuthorController@search')->name('author.buscar');
    Route::get('/listar', 'AuthorController@index')->name('author.listar');
    Route::get('/incluir', 'AuthorController@new')->name('author.incluir');
    Route::get('/alterar/{id}', 'AuthorController@update')->name('author.alterar');
    Route::get('/deletar/{id}', 'AuthorController@delete')->name('author.deletar');
    Route::get('/consultar/{id}', 'AuthorController@view')->name('author.consultar');
    Route::post('/salvar', 'AuthorController@create')->name('author.salvar');
    Route::post('/atualizar/{id}', 'AuthorController@save')->name('author.atualizar');
    Route::post('/excluir/{id}', 'AuthorController@excluir')->name('author.excluir');

    Route::get('/livros/{id}', 'AuthorController@books')->name('author.livros');
    
});

Route::prefix('editora')->group(function () {

    Route::any('/buscar', 'EditoraController@search')->name('editora.buscar');
    Route::get('/listar', 'EditoraController@index')->name('editora.listar');
    Route::post('/cancelar', 'EditoraController@cancel')->name('editora.cancelar');
    Route::get('/incluir', 'EditoraController@new')->name('editora.incluir');
    Route::get('/alterar/{id}', 'EditoraController@update')->name('editora.alterar');
    Route::get('/deletar/{id}', 'EditoraController@delete')->name('editora.deletar');
    Route::get('/consultar/{id}', 'EditoraController@view')->name('editora.consultar');
    Route::post('/salvar', 'EditoraController@create')->name('editora.salvar');
    Route::post('/atualizar/{id}', 'EditoraController@save')->name('editora.atualizar');
    Route::post('/excluir/{id}', 'EditoraController@excluir')->name('editora.excluir');

    Route::get('/livros/{id}', 'EditoraController@books')->name('editora.livros');
    
});

Route::prefix('livro')->group(function () {

    Route::any('/buscar', 'BookController@search')->name('livro.buscar');
    Route::get('/listar', 'BookController@index')->name('livro.listar');
    Route::post('/cancelar', 'BookController@cancel')->name('livro.cancelar');
    Route::get('/incluir', 'BookController@new')->name('livro.incluir');
    Route::get('/alterar/{id}', 'BookController@update')->name('livro.alterar');
    Route::get('/deletar/{id}', 'BookController@delete')->name('livro.deletar');
    Route::get('/consultar/{id}', 'BookController@view')->name('livro.consultar');
    Route::post('/salvar', 'BookController@create')->name('livro.salvar');
    Route::post('/atualizar/{id}', 'BookController@save')->name('livro.atualizar');
    Route::post('/excluir/{id}', 'BookController@excluir')->name('livro.excluir');

    Route::get('/livros/{id}', 'BookController@books')->name('livro.livros');
    
});





