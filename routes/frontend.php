<?php

//Grupo de rutas bajo el prefijo de "secciones"
Route::prefix('secciones')->group(function () {
	Route::get('/lista', 'Frontend\SeccionesController@listaSecciones')->name('lista_secciones');
	Route::get('/crear_seccion', 'Frontend\SeccionesController@crearSeccion')->name('crear_seccion');
	Route::post('/nueva_seccion', 'Frontend\SeccionesController@nuevaSeccion')->name('nueva_seccion');
	Route::get('/editar/{id}', 'Frontend\SeccionesController@editaSeccion')->name('editar_seccion');
	Route::put('/actualiza/{id}', 'Frontend\SeccionesController@actualizaSeccion')->name('actualiza_seccion');
	Route::get('/activar/{id}', 'Frontend\SeccionesController@activarSeccion')->name('activar_seccion');
	Route::get('/desactivar/{id}', 'Frontend\SeccionesController@desactivarSeccion')->name('desactivar_seccion');
});

//Grupo de rutas bajo el prefijo de "menu"
Route::prefix('menu')->group(function () {
	Route::get('/lista', 'Frontend\MenuController@listaMenu')->name('lista_menu');
	Route::get('/crear_menu', 'Frontend\MenuController@crearMenu')->name('crear_menu');
	Route::post('/nuevo_menu', 'Frontend\MenuController@nuevoMenu')->name('nuevo_menu');
	Route::get('/editar/{id}', 'Frontend\MenuController@editarMenu')->name('editar_menu');
	Route::put('/actualiza/{id}', 'Frontend\MenuController@actualizaMenu')->name('actualiza_menu');
	Route::get('/activar/{id}', 'Frontend\MenuController@activarMenu')->name('activar_menu');
	Route::get('/desactivar/{id}', 'Frontend\MenuController@desactivarMenu')->name('desactivar_menu');	
});

//Grupo de rutas bajo el prefijo de "contenido"
Route::prefix('contenido')->group(function () {
	Route::get('/lista', 'Frontend\ContenidoController@listaContenidos')->name('lista_contenido');
	Route::get('/crear_contenido', 'Frontend\ContenidoController@crearContenido')->name('crear_contenido');
	Route::post('/nuevo_contenido', 'Frontend\ContenidoController@nuevoContenido')->name('nuevo_contenido');
	Route::get('/editar/{id}', 'Frontend\ContenidoController@editarContenido')->name('editar_contenido');
	Route::put('/actualiza/{id}', 'Frontend\ContenidoController@actualizaContenido')->name('actualiza_contenido');
	/*
	Route::get('/activar/{id}', 'Frontend\ContenidoController@activarContenido')->name('activar_contenido');
	Route::get('/desactivar/{id}', 'Frontend\ContenidoController@desactivarContenido')->name('
		desactivar_contenido');*/
	Route::post('/cargar_documento/{campo}', 'Frontend\ContenidoController@cargarDoc')->name('cargar_documento');
	Route::get('/obtener_item/{campo}/{id}', 'Frontend\ContenidoController@obtenerItem')->name('obtener_item');
	Route::post('/guardar_item', 'Frontend\ContenidoController@guardarItem')->name('guardar_item');
	Route::post('/editar_item', 'Frontend\ContenidoController@editarItem')->name('editar_item');
	Route::post('/eliminar_detalle/{campo}/{id}', 'Frontend\ContenidoController@eliminarItem')->name('eliminar_detalle');
});

//Grupo de rutas bajo el prefijo de "usuarios"
Route::prefix('usuarios')->group(function () {
	Route::get('/lista', 'Frontend\UsuariosController@listarUsuarios')->name('lista_usuario');
	Route::get('/nuevo_usuario', 'Frontend\UsuariosController@nuevoUsuario')->name('nuevo_usuario');
	Route::get('/editar_usuario', 'Frontend\UsuariosController@editarUsuario')->name('editar_usuario');
});

//Grupo de rutas bajo el prefijo de "mundos"
Route::prefix('mundos')->group(function () {
	Route::get('/lista', 'Frontend\MundosController@listaMundos')->name('lista_mundos');
	Route::get('/crear_mundo', 'Frontend\MundosController@crearMundo')->name('crear_mundo');
	Route::post('/nuevo_mundo', 'Frontend\MundosController@nuevoMundo')->name('nuevo_mundo');
	Route::get('/editar/{id}', 'Frontend\MundosController@editaMundo')->name('editar_mundo');
	Route::put('/actualiza/{id}', 'Frontend\MundosController@actualizaMundo')->name('actualiza_mundo');
	Route::get('/activar/{id}', 'Frontend\MundosController@activarMundo')->name('activar_mundo');
	Route::get('/desactivar/{id}', 'Frontend\MundosController@desactivarMundo')->name('desactivar_mundo');
});

//Grupo de rutas bajo el prefijo de "carreras"
Route::prefix('carreras')->group(function () {
	Route::get('/lista', 'Frontend\CarrerasController@listaCarreras')->name('lista_carreras');
	Route::get('/crear_carrera', 'Frontend\CarrerasController@crearCarrera')->name('crear_carrera');
	Route::post('/nueva_carrera', 'Frontend\CarrerasController@nuevaCarrera')->name('nueva_carrera');
	Route::get('/editar/{id}', 'Frontend\CarrerasController@editaCarrera')->name('editar_carrera');
	Route::put('/actualiza/{id}', 'Frontend\CarrerasController@actualizaCarrera')->name('actualiza_carrera');
	Route::get('/activar/{id}', 'Frontend\CarrerasController@activarCarrera')->name('activar_carrera');
	Route::get('/desactivar/{id}', 'Frontend\CarrerasController@desactivarCarrera')->name('desactivar_carrera');
	Route::post('/cargar_imagen/{campo}', 'Frontend\CarrerasController@cargarImg')->name('
		cargar_imagen');
	Route::get('/obtener_item/{campo}/{id}', 'Frontend\CarrerasController@obtenerItem')->name('obtener_item');
	Route::post('/guardar_item', 'Frontend\CarrerasController@agregarItem')->name('guardar_item');
	Route::post('/editar_item', 'Frontend\CarrerasController@editarItem')->name('editar_item');
});

//Configuracion General
Route::get('/configuracion_general', 'Frontend\HomeController@verConfGeneral')->name('configuracion_general');

//Grupo de rutas bajo el prefijo de "sedes"
Route::prefix('sedes')->group(function () {
	Route::get('/lista', 'Frontend\SedesController@listaSedes')->name('lista_sedes');
	Route::get('/crear_sede', 'Frontend\SedesController@crearSede')->name('crear_sede');
	Route::post('/nueva_sede', 'Frontend\SedesController@nuevaSede')->name('nueva_sede');
	Route::get('/editar/{id}', 'Frontend\SedesController@editaSede')->name('editar_sede');
	Route::put('/actualiza/{id}', 'Frontend\SedesController@actualizaSede')->name('actualiza_sede');
	Route::get('/activar/{id}', 'Frontend\SedesController@activarSede')->name('activar_sede');
	Route::get('/desactivar/{id}', 'Frontend\SedesController@desactivarSede')->name('desactivar_sede');
});

//Grupo de rutas bajo el prefijo de "eventos"
Route::prefix('eventos')->group(function () {
	Route::get('/lista', 'Frontend\EventosController@listaEventos')->name('lista_eventos');
	Route::get('/crear_evento', 'Frontend\EventosController@crearEvento')->name('crear_evento');
	Route::post('/nuevo_evento', 'Frontend\EventosController@nuevoEvento')->name('nuevo_evento');
	Route::get('/editar/{id}', 'Frontend\EventosController@editaEvento')->name('editar_evento');
	Route::put('/actualiza/{id}', 'Frontend\EventosController@actualizaEvento')->name('actualiza_evento');
	Route::get('/activar/{id}', 'Frontend\EventosController@activarEvento')->name('activar_evento');
	Route::get('/desactivar/{id}', 'Frontend\EventosController@desactivarEvento')->name('desactivar_evento');
	Route::post('/subir_imagen/{campo}', 'Frontend\EventosController@subirImg')->name('subir_imagen');
	Route::post('/eliminar_imagen/{campo}/{id}', 'Frontend\EventosController@eliminarItem')->name('eliminar_imagen');
});

//Grupo de rutas bajo el prefijo de "egresados"
Route::prefix('egresados')->group(function () {
	Route::get('/lista', 'Frontend\EgresadosController@listaEgresados')->name('lista_egresados');
	Route::get('/crear_egresado', 'Frontend\EgresadosController@crearEgresado')->name('crear_egresado');
	Route::post('/nuevo_egresado', 'Frontend\EgresadosController@nuevoEgresado')->name('nuevo_egresado');
	Route::get('/editar/{id}', 'Frontend\EgresadosController@editaEgresado')->name('editar_egresado');
	Route::put('/actualiza/{id}', 'Frontend\EgresadosController@actualizaEgresado')->name('actualiza_egresado');
	Route::get('/obtener_item/{campo}/{id}', 'Frontend\EgresadosController@obtenerItem')->name('obtener_item');
	Route::post('/guardar_item', 'Frontend\EgresadosController@agregarItem')->name('guardar_item');
	Route::post('/editar_item', 'Frontend\EgresadosController@editarItem')->name('editar_item');
	/*
	Route::get('/activar/{id}', 'Frontend\CarrerasController@activarCarrera')->name('activar_carrera');
	Route::get('/desactivar/{id}', 'Frontend\CarrerasController@desactivarCarrera')->name('desactivar_carrera');
	*/
});


//Grupo de rutas bajo el prefijo de "paginas"
Route::prefix('paginas')->group(function () {
	Route::get('/lista', 'Frontend\PaginasController@listaPaginas')->name('lista_paginas');
	Route::get('/crear_pagina', 'Frontend\PaginasController@crearPagina')->name('crear_pagina');
	Route::post('/nueva_pagina', 'Frontend\PaginasController@nuevaPagina')->name('nueva_pagina');
	Route::get('/editar/{id}', 'Frontend\PaginasController@editaPagina')->name('editar_pagina');
	Route::put('/actualiza/{id}', 'Frontend\PaginasController@actualizaPagina')->name('actualiza_pagina');
	Route::get('/obtener_item/{campo}/{id}', 'Frontend\PaginasController@obtenerItem')->name('obtener_item');
	Route::post('/guardar_item', 'Frontend\PaginasController@agregarItem')->name('guardar_item');
	Route::post('/editar_item', 'Frontend\PaginasController@editarItem')->name('editar_item');
	/*
	Route::get('/activar/{id}', 'Frontend\CarrerasController@activarCarrera')->name('activar_carrera');
	Route::get('/desactivar/{id}', 'Frontend\CarrerasController@desactivarCarrera')->name('desactivar_carrera');
	*/
});


//Grupo de rutas bajo el prefijo de "historias"
Route::prefix('historias')->group(function () {
	Route::get('/lista', 'Frontend\HistoriasController@listaHistorias')->name('lista_historias');
	Route::get('/crear_historia', 'Frontend\HistoriasController@crearHistoria')->name('crear_historia');
	Route::post('/nueva_historia', 'Frontend\HistoriasController@nuevaHistoria')->name('nueva_historia');
	Route::get('/editar/{id}', 'Frontend\HistoriasController@editaHistoria')->name('editar_historia');
	Route::put('/actualiza/{id}', 'Frontend\HistoriasController@actualizaHistoria')->name('actualiza_historia');
	Route::get('/obtener_item/{id}', 'Frontend\HistoriasController@obtenerItem')->name('obtener_item');
	Route::post('/guardar_item', 'Frontend\HistoriasController@agregarItem')->name('guardar_item');
	Route::post('/editar_item', 'Frontend\HistoriasController@editarItem')->name('editar_item');
	Route::post('/eliminar_item/{id}', 'Frontend\HistoriasController@eliminarItem')->name('eliminar_item');
	/*
	Route::get('/activar/{id}', 'Frontend\CarrerasController@activarCarrera')->name('activar_carrera');
	Route::get('/desactivar/{id}', 'Frontend\CarrerasController@desactivarCarrera')->name('desactivar_carrera');
	*/
});

//Grupo de rutas bajo el prefijo de "blog"
Route::prefix('blog')->group(function () {
	Route::get('/lista', 'Frontend\BlogsController@listaArticulos')->name('lista_articulos');
	Route::get('/crear_articulo', 'Frontend\BlogsController@crearArticulo')->name('crear_articulo');
	Route::post('/nuevo_articulo', 'Frontend\BlogsController@nuevoArticulo')->name('nuevo_articulo');
	Route::get('/editar/{id}', 'Frontend\BlogsController@editaArticulo')->name('editar_articulo');
	Route::put('/actualiza/{id}', 'Frontend\BlogsController@actualizaArticulo')->name('actualiza_articulo');
	Route::get('/activar/{id}', 'Frontend\BlogsController@activarArticulo')->name('activar_articulo');
	Route::get('/desactivar/{id}', 'Frontend\BlogsController@desactivarArticulo')->name('desactivar_articulo');
});