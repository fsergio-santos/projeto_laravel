<?php


Route::namespace('Auth')->group(function(){
    
    Route::get('/', 'LoginController@carregaLogin')->name('page.login');
    Route::get('/login', 'LoginController@carregaLogin')->name('page.login');
    Route::get('/logout','LoginController@logout')->name('user.logout');
    Route::post('/login','LoginController@login')->name('user.login');
    
    Route::get('/usuario/registrar', 'RegisterController@index')->name('usuario.registrar');
    Route::get('/usuario/mailpage', 'RegisterController@mailpage')->name('usuario.mailpage');
    Route::get('/verify_account', 'RegisterController@verifyAccount');
    Route::post('/usuario/registrar', 'RegisterController@registrar')->name('usuario.registrar');
    Route::post('/usuario/recuperar/senha', 'RegisterController@forgotPassword')->name('usuario.recuperarsenha');
    Route::get('reset_password', 'RegisterController@showResetPasswordPage')->name('reset.password');
    Route::post('/usuario/reset/senha', 'RegisterController@resetPassword')->name('usuario.resetsenha');

});


Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/imagem/{imagem}','ImageController@images')->name('imagem.images');

    Route::post('/store','ImageController@store')->name('imagem.store');
    Route::post('/imagem/excluir','ImageController@excluir')->name('imagem.excluir');


    Route::prefix('usuario')->group(function () {

        Route::any('/buscar', 'UserController@search')->name('usuario.buscar');
        Route::any('/cancelar', 'UserController@cancel')->name('usuario.cancelar');

        Route::get('/listar', 'UserController@index')->name('usuario.listar');
        Route::get('/incluir', 'UserController@new')->name('usuario.incluir');
        Route::get('/alterar/{id}', 'UserController@update')->name('usuario.alterar');
        Route::get('/deletar/{id}', 'UserController@delete')->name('usuario.deletar');
        Route::get('/consultar/{id}', 'UserController@view')->name('usuario.consultar');

        Route::post('/salvar', 'UserController@create')->name('usuario.salvar');
        Route::post('/atualizar/{id}', 'UserController@save')->name('usuario.atualizar');
        Route::post('/excluir/{id}', 'UserController@excluir')->name('usuario.excluir');

       Route::get('/role/{id}', 'UserController@roles')->name('usuario.role');
       Route::post('/role/salvar', 'UserController@salvarRoles')->name('usuario.role.salvar');
       Route::get('/role/deletar/{usuario}/{role}', 'UserController@deletarRoles')->name('usuario.role.deletar');
      
    });
    
    Route::prefix('author')->group(function () {
    
        Route::any('/buscar', 'AuthorController@search')->name('author.buscar');
        Route::any('/cancelar', 'AuthorController@cancel')->name('author.cancelar');
      
        Route::get('/listar', 'AuthorController@index')->name('author.listar');
    
        Route::get('/incluir', 'AuthorController@new')->name('author.incluir');
        Route::get('/alterar/{id}', 'AuthorController@update')->name('author.alterar');
        Route::get('/deletar/{id}', 'AuthorController@delete')->name('author.deletar');
        Route::get('/consultar/{id}', 'AuthorController@view')->name('author.consultar');
        Route::get('/livros/{id}', 'AuthorController@books')->name('author.livros');
        
        Route::post('/salvar', 'AuthorController@create')->name('author.salvar');
        Route::post('/atualizar/{id}', 'AuthorController@save')->name('author.atualizar');
        Route::post('/excluir/{id}', 'AuthorController@excluir')->name('author.excluir');
    
        
    });

    Route::prefix('editora')->group(function () {

        Route::any('/buscar', 'EditoraController@search')->name('editora.buscar');
        Route::any('/cancelar', 'EditoraController@cancel')->name('editora.cancelar');
      
        Route::get('/listar', 'EditoraController@index')->name('editora.listar');
        Route::get('/incluir', 'EditoraController@new')->name('editora.incluir');
        Route::get('/alterar/{id}', 'EditoraController@update')->name('editora.alterar');
        Route::get('/deletar/{id}', 'EditoraController@delete')->name('editora.deletar');
        Route::get('/consultar/{id}', 'EditoraController@view')->name('editora.consultar');
        Route::get('/livros/{id}', 'EditoraController@books')->name('editora.livros');
      
        Route::post('/salvar', 'EditoraController@create')->name('editora.salvar');
        Route::post('/atualizar/{id}', 'EditoraController@save')->name('editora.atualizar');
        Route::post('/excluir/{id}', 'EditoraController@excluir')->name('editora.excluir');
    
        
    });
    
    Route::prefix('livro')->group(function () {
    
        Route::any('/buscar', 'BookController@search')->name('livro.buscar');
        Route::any('/cancelar', 'BookController@cancel')->name('livro.cancelar');
     
        Route::get('/listar', 'BookController@index')->name('livro.listar');
        Route::get('/incluir', 'BookController@new')->name('livro.incluir');
        Route::get('/alterar/{id}', 'BookController@update')->name('livro.alterar');
        Route::get('/deletar/{id}', 'BookController@delete')->name('livro.deletar');
        Route::get('/consultar/{id}', 'BookController@view')->name('livro.consultar');
     
        Route::post('/salvar', 'BookController@create')->name('livro.salvar');
        Route::post('/atualizar/{id}', 'BookController@save')->name('livro.atualizar');
        Route::post('/excluir/{id}', 'BookController@excluir')->name('livro.excluir');
        
    });

    Route::prefix('role')->group(function () {

        Route::any('/buscar', 'RoleController@search')->name('role.buscar');
        Route::any('/cancelar', 'RoleController@cancel')->name('role.cancelar');

        Route::get('/listar', 'RoleController@index')->name('role.listar');
        Route::get('/incluir', 'RoleController@new')->name('role.incluir');
        Route::get('/alterar/{id}', 'RoleController@update')->name('role.alterar');
        Route::get('/deletar/{id}', 'RoleController@delete')->name('role.deletar');
        Route::get('/consultar/{id}', 'RoleController@view')->name('role.consultar');

        Route::post('/salvar', 'RoleController@create')->name('role.salvar');
        Route::post('/atualizar/{id}', 'RoleController@save')->name('role.atualizar');
        Route::post('/excluir/{id}', 'RoleController@excluir')->name('role.excluir');

        Route::get('/permissao/{id}', 'RolePermissaoController@permissoes')->name('role.permissao');
        Route::post('/permissao/salvar', 'RolePermissaoController@salvarPermissoes')->name('role.permissao.salvar');
        Route::get('/permissao/deletar/{role}/{permissao}/{acao}', 'RolePermissaoController@deletarPermissoes')->name('role.permissao.deletar');
      
    });


    
    Route::prefix('permissao')->group(function () {

        Route::any('/buscar', 'PermissaoController@search')->name('permissao.buscar');
        Route::any('/cancelar', 'PermissaoController@cancel')->name('permissao.cancelar');

        Route::get('/listar', 'PermissaoController@index')->name('permissao.listar');
        Route::get('/incluir', 'PermissaoController@new')->name('permissao.incluir');
        Route::get('/alterar/{id}', 'PermissaoController@update')->name('permissao.alterar');
        Route::get('/deletar/{id}', 'PermissaoController@delete')->name('permissao.deletar');
        Route::get('/consultar/{id}', 'PermissaoController@view')->name('permissao.consultar');

        Route::post('/salvar', 'PermissaoController@create')->name('permissao.salvar');
        Route::post('/atualizar/{id}', 'PermissaoController@save')->name('permissao.atualizar');
        Route::post('/excluir/{id}', 'PermissaoController@excluir')->name('permissao.excluir');
      
    });

    Route::prefix('acao')->group(function () {

        Route::any('/buscar', 'AcaoController@search')->name('acao.buscar');
        Route::any('/cancelar', 'AcaoController@cancel')->name('acao.cancelar');

        Route::get('/listar', 'AcaoController@index')->name('acao.listar');
        Route::get('/incluir', 'AcaoController@new')->name('acao.incluir');
        Route::get('/alterar/{id}', 'AcaoController@update')->name('acao.alterar');
        Route::get('/deletar/{id}', 'AcaoController@delete')->name('acao.deletar');
        Route::get('/consultar/{id}', 'AcaoController@view')->name('acao.consultar');

        Route::post('/salvar', 'AcaoController@create')->name('acao.salvar');
        Route::post('/atualizar/{id}', 'AcaoController@save')->name('acao.atualizar');
        Route::post('/excluir/{id}', 'AcaoController@excluir')->name('acao.excluir');
      
    });
    
});






