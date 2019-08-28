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
    return view('welcome');
});

Auth::routes();


// Grupo que gerencia as rotas, não deixar acessar sem não estiver logado!
Route::group(['middleware' => ['auth']], function(){

    // Rotas CRUD
    Route::get('arquivos', 'ArquivosController@index');  //linka página index.blade.php
    Route::get('arquivos/add', 'ArquivosController@create'); //linka página add.blade.php porém não sei porque? pois a rota e arquivos.create
    Route::post('arquivos/store', 'ArquivosController@store'); 
    Route::get('arquivos/edit/{id}', 'ArquivosController@edit'); //linka página edit.blade.php porém não sei porque? pois a rota e arquivos.adit
    Route::put('arquivos/edit/{id}', 'ArquivosController@update'); //linka página edit.blade.php porém não sei porque? pois a rota e arquivos.adit
    Route::delete('arquivos/delete/{id}', 'ArquivosController@destroy'); //linka página edit.blade.php porém não sei porque? pois a rota e arquivos.adit
    Route::get('arquivos/getFile/{id}', 'ArquivosController@getFile'); //linka página edit.blade.php porém não sei porque? pois a rota e arquivos.adit
    

    // UPLOAD DO ARQUIVO
    Route::get('arquivos/upload', 'ArquivosController@upload');
    Route::post('arquivos/upload', 'ArquivosController@move');

    Route::get('/home', 'HomeController@index')->name('home');

});