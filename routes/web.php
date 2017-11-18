<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('homePage');
});

Route::group(['middleware' => 'web'], function(){

    Auth::routes();

    //Redireciona para view de inicio
    Route::get('homePage', ['as' => 'pageOne', 'uses' => 'HomeController@inicio']);

    //Passa para Home as categorias no BD
    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

    //Lista todos os registros de entrada em aberto na base
    Route::get('listagem', ['as' => 'read', 'uses' => 'HomeController@show']);

    //Salva novos registros
    Route::post('entrada/store', ['as' => 'store', 'uses' => 'HomeController@store']);

    //Redireciona para a view de edição
    Route::get('entrada/{entrada}/editar', ['as' => 'editar', 'uses' => 'HomeController@edit']);

    //Faz a atualização salvando alterações
    Route::patch('entrada/{ent}', ['as' => 'atualizar', 'uses' =>'HomeController@update']);

    //Redireciona para view de saida, onde os valores serão calculados conforme REGRA DE NEGÓCIO
    Route::get('saida/{entrada}/fechamento', ['as' => 'saida', 'uses' => 'HomeController@saida']);

    //Atualiza a base inserindo totais pagos
    Route::patch('saida/{ent}', ['as' => 'fechamento', 'uses' => 'HomeController@fechamento']);

    //Faz Exclusão de uma ENTRADA na base de dados
    Route::delete('entrada/{entrada}', ['as' => 'delete', 'middleware' => 'auth.role:admin', 'uses' => 'HomeController@delete']);

    //Redireciona para view de RELATÓRIOS
    Route::get('relatorios', ['as' => 'report', 'middleware' => 'auth.role:admin', 'uses' => 'HomeController@report']);

    //Filtra os relatórios por tipos
    Route::get('relatorios/{par}', ['as' => 'reports', 'middleware' => 'auth.role:admin', 'uses' => 'HomeController@reports']);


    //CRUD categorias
    //Retorna a view com as categorias para posterior alteração
    Route::get('configuracoes', ['as' => 'config', 'middleware' => 'auth.role:admin', 'uses' => 'HomeController@config']);

    //Altera as categorias
    Route::patch('configuracoes/categorias', ['as' => 'configEdit', 'middleware' => 'auth.role:admin', 'uses' => 'HomeController@configEdit']);


    //CRUD usuários

    //Listagem user
    Route::get('registro', ['as' => 'registros', 'middleware' => 'auth.role:admin', 'uses' => 'UsuariosController@show']);

    //Create user
    Route::get('usuarios', ['as' => 'usuarios', 'middleware' => 'auth.role:admin', 'uses' => 'Auth\RegisterController@showRegistrationForm']);


    //Update
    //Editar Usuário
    Route::get('usuarios/{user}/edit', ['as' => 'editUser', 'middleware' => 'auth.role:admin', 'uses' => 'UsuariosController@edit']);

    //Salvando Edição Usuário
    Route::patch('usuarios/{user}', ['as' => 'updateUser', 'middleware' => 'auth.role:admin', 'uses' => 'UsuariosController@registerUpdate']);


    //Deletar USUÁRIOS
    Route::delete('usuarios/{user}', ['as' => 'delete/user', 'middleware' => 'auth.role:admin', 'uses' => 'UsuariosController@delete']);


    //Teste para não ADMINISTRADORES
    Route::get('/gta', function (){

        return view('accessdenied');//'Você não é administrador!<br>Volte para página anterior';

    })->name('gta');

});





