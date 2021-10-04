<?php

Route::prefix('painel')->group(function(){
    Route::get('/', 'Controller@index')->name('painel');

    Route::get('login', 'Auth\LoginController@index')->name('login');
    Route::post('login', 'Auth\LoginController@authenticate');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Auth\RegisterController@index')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('categorias', 'CategoriasController@index')->name('categorias');
    Route::get('produtos', 'ProdutosController@index')->name('produtos');
    Route::get('vendas', 'VendasController@index')->name('vendas');
    Route::get('clientes', 'ClientesController@index')->name('clientes');

});

?>
