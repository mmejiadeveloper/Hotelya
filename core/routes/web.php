<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::get('/', 'HomeController@index');


/**
 * Rutas de hoteles
 */

//1.Checks for the post Route
Route::post('login', 'LoginController@login')->name('login');
//2. Right inmedialtly he ask for the get Routge
Route::get('login', 'LoginController@index');
//Need to have both of them GET and POST
Route::get('logout', 'LoginController@logout');
//User registration
Route::post('register', 'LoginController@register');
Route::get('main', 'HomeController@main')->name("main");
//Email account auth
Route::get('emailver/{token}', 'LoginController@emailactivation');

Route::get('passwordrecovery/{token}', 'LoginController@passwordrecovery');
//Detect user type
Route::get('identify_users/{user_id?}', 'ManageusersController@identify_user')->name("identify_users"); 
//User password restorartion
Route::post('password_restore', 'LoginController@passwordrestoration')->name('password_restore');

Route::post('changepassword', 'LoginController@changepassword')->name('changepassword');


/**
 * Rutas Hoteles
 */
Route::post('hotel_store', 'HotelController@store')->name('hotel_store');

Route::get('saludoInicial', 'HotelController@saludoInicial')->name('saludoInicial');
Route::get('hoteles_administrar', 'HotelController@index')->name('hoteles_administrar')->middleware('recep');
Route::get('hotel_create', 'HotelController@create')->name('hotel_create')->middleware('admin');
Route::prefix('hoteles')->group(function () {
   
	//ajax empleados
    Route::post('listar_habitaciones', "HotelController@listar_habitaciones")->name("listar_habitaciones");
    Route::post('registrar_habitacion', "HotelController@registrar_habitacion")->name("registrar_habitacion");
    Route::post('cambiarestado', "HotelController@cambiarestado")->name("cambiarestado");
});

/**
 * Rutas  habitaciones
 * 
 */ 
Route::get('habitaciones_administrar', 'HabitacionController@index')->name('habitaciones_administrar')->middleware('admin');
Route::post('listarhabitaciones', 'HabitacionController@listarhabitaciones')->name('listarhabitaciones')->middleware('admin');
Route::post('editarHabitacion', 'HabitacionController@editarHabitacion')->name('editarHabitacion')->middleware('admin');
Route::get('habitaciones_editar/{name?}', 'HabitacionController@edit')->name('habitaciones_editar')->middleware('admin');;
Route::resource('habitacion', 'HabitacionController')->middleware('admin');;

/**
 * Rutas Clientes
 */

Route::prefix('datos')->group(function () {
    //ajax empleados
    Route::post('listar_hoteles', "clienteController@listar_hoteles")->name("listar_hoteles");
    
    Route::post('habitacionesdisponibles', "clienteController@habitacionesdisponibles")->name("habitacionesdisponibles");
    
});

Route::resource('clientes', 'clienteController');

Route::get('clientesindex', "clienteController@index")->name("clientesindex");
Route::get('confirmarReserva', "clienteController@indexconfirmacion")->name("confirmarReserva");
Route::post('consulta_reserva', "clienteController@confirmacionReserva")->name("consulta_reserva");

/**
 * Rutas Reservas
 */
Route::get('reservas_administrar', 'ReservaController@index')->name('reservas_administrar')->middleware('recep');;
Route::prefix('reservas')->group(function () {
    Route::post('listar_reservas', "ReservaController@listar_reservas")->name("listar_reservas");
	//ajax reservas
    Route::post('registrar_reserva', "ReservaController@registrar_reserva")->name("registrar_reserva");
    Route::get('editar_reservas/{id?}', "ReservaController@editar_reservas")->name("editar_reservas");
    Route::post('ed_reserva', "ReservaController@ed_reserva")->name("ed_reserva");
    Route::post('destroy', "ReservaController@eliminarReserva")->name("destroy");
});

/**
 * rutas de pagos
 */
Route::prefix('pagos')->group(function () {
Route::post('registrar_pagoreserva', "PagoController@registrar_pagoreserva")->name("registrar_pagoreserva");
});

/**
 * rutas de servicios
 */
Route::get('servicios_administrar', 'ServicioController@index')->name('servicios_administrar')->middleware('admin');
Route::prefix('servicios')->group(function () {
   
	//ajax 
    Route::post('listar_servicios', "ServicioController@listar_servicios")->name("listar_servicios");
    Route::post('registrar_servicios', "ServicioController@registrar_servicios")->name("registrar_servicios");
});

/**
 * rutas de graficas
 */
Route::resource('graficas', 'GraficaController')->middleware('admin');;
Route::get('graficashuespedes', 'GraficaController@index2')->name("graficashuespedes")->middleware('admin');
Route::get('grafica_registros/{anio}/{mes}', 'GraficaController@registros_mes')->middleware('admin');
Route::get('grafica_registros_huespedes/{anio}/{mes}', 'GraficaController@registros_mes_huespedes')->middleware('admin');
Route::get('grafica_registros_suma_pago_reservas/{anio}/{mes}', 'GraficaController@registros_mes_suma_pago_reservas')->middleware('admin');
Route::get('grafica_registros_suma_pago_huespedes/{anio}/{mes}', 'GraficaController@registros_mes_suma_pago_huespedes')->middleware('admin');
Route::get('grafica_barras_meses', 'GraficaController@grafica_barras_meses')->name('grafica_barras_meses')->middleware('admin');
Route::post('obtener_pagos', 'GraficaController@obtener_pagos')->name('obtener_pagos')->middleware('admin');

/**
 * rutas de reportes
 */
Route::get('reportes', 'PdfController@index')->name("reportes")->middleware('admin');;
Route::get('crearPDF', 'PdfController@crearPDF')->middleware('admin');;
Route::get('reporte_pago_huespedes', 'PdfController@reporte_pagos_huespedes')->name("reporte_pago_huespedes")->middleware('admin');;
Route::post('reporte_pago_huespedes_ajx', 'PdfController@reporte_pagos_huespedes')->name("reporte_pago_huespedes")->middleware('admin');;
Route::get('reporte_pagos_reservas/{tipo}', 'PdfController@reporte_pagos_reservas')->name("reporte_pagos_reservas")->middleware('admin');;

/**
 *  rutas facturas
 */
// Route::post('generarFactura', 'PdfController@generarFactura')->name('generarFactura');
Route::get('generarFactura/{habitacion}/{id}', 'PdfController@generarFactura')->name('generarFactura')->middleware('recep');
Route::get('generarFacturaReserva/{cedula}', 'PdfController@generarFacturaReserva')->name('generarFacturaReserva');

/**
 * ruta de middlware
 */
Route::get('findex', 'clienteController@falsoindex')->name('findex');

/**
 * rutas para imagenes
 */
Route::resource('imagenes', 'imagenesController')->middleware('admin');
Route::get('subirImagen/{idhotel}', 'imagenesController@createWhitDatos')->name("subirImagen")->middleware('admin');
Route::get('/mostrarImagenes/{id}', 'imagenesController@mostrarImagenes')->name("mostrarImagenes");//->middleware('admin');

