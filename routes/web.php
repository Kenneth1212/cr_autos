<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/','PageController');
Route::resource('/autos','PageAutoController');
Route::get('back/{url}','PageController@back')->name('back');

Route::get('logout','LoginController@logout')->name('logout');
Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('social.auth');
Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');

Route::get('user','UserController@editar')->name('user.edit');
Route::put('user/update','UserController@update')->name('user.update');
Route::delete('user/destroy','UserController@destroy')->name('user.destroy');

Route::resource('vehiculo','VehiculoController');
Route::post('deseado/controlador','DeseadoController@controlador');
Route::get('/deseado/init/{id}/{id2}','DeseadoController@init');
Route::get('deseados','DeseadoController@index')->name('deseados'); 

Route::get('/busqueda','BusquedaController@index');
Route::post('/consulta','BusquedaController@consulta')->name('consulta');
//Route::get('deseado/consulta/{id1}/{id2}','DeseadoController@consulta');
 
Route::get('/eliminarimg/{id}/{id2}/{url}','GaleriaController@destroy');



Route::post('/contactar', 'EmailController@contact')->name('contact');
Route::get('info', 'EmailController@info');

Route::resource('galeria', 'GaleriaController');

Route::get('/publicaciones','PublicacionController@index')->name('publicaciones');
Route::post('publicaciones/update','PublicacionController@update');


Route::get('imprimir/{id}','PDFController@imprimir')->name('imprimir');

Route::get('modelos/{id}','ModeloController@get_modelos');

Route::post('/filtro','FiltroController@filtro')->name('filtro');
 

