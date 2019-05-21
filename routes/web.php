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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => 'auth'] ,function(){

  Route::resource('empleados', 'EmpleadosController');
  Route::resource('servicios', 'ServicioController');
  Route::resource('clientes', 'ClienteController');
  Route::resource('productos', 'ProductoController');
  Route::resource('proyectos', 'ProyectoController');

  Route::post('proyectos-servicios', 'ProyectoController@proyectoServicios')->name('proyectos.servicios');  
  Route::get('proyectos-servicios/{id}', 'ProyectoController@proyectoServicioDelete')->name('proyecto.servicio.delete');

  Route::post('proyectos-productos', 'ProductoController@proyectoProductos')->name('proyectos.productos');
  Route::get('proyectos-productos/{id}', 'ProductoController@proyectoProductoDelete')->name('proyecto.producto.delete'); 
  Route::get('proyectos/image/{id}', 'ProyectoController@proyectoImage')->name('proyecto.image'); 


  Route::post('proyectos-empleados', 'EmpleadosController@proyectoEmpleado')->name('proyectos.empleados');
  Route::get('proyectos-empleados/{id}', 'EmpleadosController@proyectoEmpleadoDelete')->name('proyecto.empleado.delete');


  Route::get('proyecto-pdf/{id}', 'ProyectoController@proyectoPdf')->name('proyecto.pdf');
  
  Route::post('subirimagenes/{id}', 'ImageController@store');

  Route::get('proyectos/imagenes/delete/{id}', 'ImageController@destroy');

});