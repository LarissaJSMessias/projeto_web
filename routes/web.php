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

//Route::get('/usuario/incluir', function () {
  //  return view('voo.incluir');
//});


use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::get('/imagem/{imagem}', 'ImageController@getImages')->name('imagem.get');
Route::get('/thumbnail/{imagem}', 'ImageController@getThumbnail')->name('thumbnail.get');
Route::post('/store', 'ImageController@store')->name('imagem.store');
Route::post('/imagem/excluir', 'ImageController@excluir')->name('imagem.excluir');

Route::get('/usuario/listar','UserController@index')->name('usuario.listar');
Route::get('/usuario/cadastrar','UserController@new')->name('usuario.cadastrar');
Route::get('/usuario/cancelar','UserController@cancel')->name('usuario.incluir');
Route::post('/usuario/salvar', 'UserController@create')->name('usuario.salvar');
Route::get('/usuario/alterar/{id}', 'UserController@update')->name('usuario.update');
Route::post('/usuario/update/{id}', 'UserController@save')->name('usuario.atualizar');



Route::get('/cliente/listar', 'ClienteController@index')->name('cliente.listar');
Route::get('/cliente/incluir', 'ClienteController@new')->name('cliente.incluir');
Route::get('/cliente/cancelar', 'ClienteController@cancel')->name('cliente.cancelar');

Route::get('/cliente/alterar/{id}', 'ClienteController@update')->name('cliente.update');
Route::get('/cliente/excluir/{id}', 'ClienteController@delete')->name('cliente.delete');
Route::get('/cliente/consultar/{id}', 'ClienteController@consult')->name('cliente.consultar');

Route::post('/cliente/salvar', 'ClienteController@create')->name('cliente.salvar');
Route::post('/cliente/update/{id}', 'ClienteController@save')->name('cliente.atualizar');
Route::post('/cliente/excluir/{id}', 'ClienteController@excluir')->name('cliente.excluir');




Route::get('/voo/listar', 'VooController@index')->name('voo.listar');
Route::get('/voo/incluir', 'VooController@new')->name('voo.incluir');
Route::get('/voo/cancelar', 'VooController@cancel')->name('voo.cancelar');

Route::get('/voo/alterar/{id}', 'VooController@update')->name('voo.update');
Route::get('/voo/excluir/{id}', 'VooController@delete')->name('voo.delete');
Route::get('/voo/consultar/{id}', 'VooController@consult')->name('voo.consultar');

Route::post('/voo/salvar', 'VooController@create')->name('voo.salvar');
Route::post('/voo/update/{id}', 'VooController@save')->name('voo.atualizar');
Route::post('/voo/excluir/{id}', 'VooController@excluir')->name('voo.excluir');



Route::get('/compra/listar','CompraController@index')->name('compra.listar');
Route::get('/compra/cadastrar','CompraController@new')->name('compra.cadastrar');
Route::get('/compra/cancelar','CompraController@cancel')->name('compra.listar');

Route::get('/compra/alterar/{id}','CompraController@update')->name('compra.update');
Route::get('/compra/excluir/{id}','CompraController@delete')->name('compra.delete');
Route::get('/compra/concultar/{id}','CompraController@view')->name('compra.consultar');

Route::post('/compra/salvar','CompraController@create')->name('compra.salvar');
Route::post('/compra/update/{id}','CompraController@save')->name('compra.atualizar');
Route::post('/compra/excluir/{id}','CompraController@excluir')->name('compra.excluir');




Route::get('/reserva/listar','ReservaController@index')->name('reserva.listar');
Route::get('/reserva/cadastrar','ReservaController@new')->name('reserva.cadastrar');
Route::get('/reserva/cancelar','ReservaController@cancel')->name('reserva.listar');

Route::get('/reserva/alterar/{id}','ReservaController@update')->name('reserva.update');
Route::get('/reserva/excluir/{id}','ReservaController@delete')->name('reserva.delete');
Route::get('/reserva/concultar/{id}','ReservaController@view')->name('reserva.consultar');

Route::post('/reserva/salvar','ReservaController@create')->name('reserva.salvar');
Route::post('/reserva/update/{id}','ReservaController@save')->name('reserva.atualizar');
Route::post('/reserva/excluir/{id}','ReservaController@excluir')->name('reserva.excluir');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

