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
//HOME LANDING PAGE
Route::get('/', 'HomeController@index')->name('home');

//HOME CMS
Route::get('frontend/home', 'Frontend\HomeController@index')->name('home_cms');

//Lista de Articulos
Route::get('/blog', 'HomeController@blog')->name('blog');
//Pagina Dinamica de Artículo
Route::get('blog/{id}/{slug}', array('as' => '{id}', 'uses' => 'HomeController@articulo'));

//Lista de Egresados
Route::get('/alumnos-egresados', 'HomeController@listaEgresados')->name('alumnos_egresados');
//Pagina Dinamica de Egresados por carrera
Route::get('alumnos-egresados/{id}/{slug}', array('as' => '{id}', 'uses' => 'HomeController@listaEgresadosCarrera'));

//Modalidades de Titulación
Route::get('/modalidades-titulacion', 'HomeController@modalidadesTitulacion')->name('modalidades_titulacion');

//Pagina Dinamica de Evento
Route::get('evento/{id}', array('as' => '{id}', 'uses' => 'HomeController@evento'));
//Pagina Dinamica de Carrera
Route::get('carrera/{id}', array('as' => '{id}', 'uses' => 'HomeController@carrera'));
//Pagina Dinamica de Egresado
Route::get('egresado/{id}', array('as' => '{id}', 'uses' => 'HomeController@egresado'));
//Pagina Dinamica
Route::get('{id}/{slug}', array('as' => '{id}', 'uses' => 'HomeController@pagina'));

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();



