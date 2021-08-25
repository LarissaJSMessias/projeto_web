<?php
header('Access-Control-Allow-Origin: http://localhost:3000');

header('Access-Control-Allow-Headers: origin, x-requested-with, content-type');

header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::get('/cliente/listar', 'Rest\ClienteRestController@index');

Route::get('/usuario/listar', 'Rest\UserRestController@index');

Route::post('/cliente/salvar','Rest\ClienteRestController@create');

Route::get('/cliente/alterar/{id}', 'Rest\ClienteRestController@update');

Route::post('/cliente/update/{id}','Rest\ClienteRestController@save');


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
