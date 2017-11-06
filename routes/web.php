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

    Route::get('homePage', ['as' => 'pageOne', 'uses' => 'HomeController@inicio']);

    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::get('listagem', ['as' => 'read', 'uses' => 'HomeController@show']);

    Route::post('entrada/store', ['as' => 'store', 'uses' => 'HomeController@store']);

    Route::get('entrada/{entrada}/editar', ['as' => 'editar', 'uses' => 'HomeController@edit']);

    Route::patch('entrada/{ent}', ['as' => 'atualizar', 'uses' =>'HomeController@update']);

    Route::get('saida/{entrada}/fechamento', ['as' => 'saida', 'uses' => 'HomeController@saida']);

    Route::patch('saida/{ent}', ['as' => 'fechamento', 'uses' => 'HomeController@fechamento']);

    Route::delete('entrada/{entrada}', ['as' => 'delete', 'uses' => 'HomeController@delete']);

    Route::get('relatorios', ['as' => 'report', 'uses' => 'HomeController@report']);

    Route::get('relatorios/{par}', ['as' => 'reports', 'uses' => 'HomeController@reports']);

    //CRUD categorias

    Route::get('configuracoes', ['as' => 'config', 'uses' => 'HomeController@config']);
    Route::patch('configuracoes/categorias', ['as' => 'configEdit', 'uses' => 'HomeController@configEdit']);

});





