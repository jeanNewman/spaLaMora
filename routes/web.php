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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/yape', 'YapeController@index')->name('yape');
    Route::get('/yape/revisarShopify', 'YapeController@revisarShopify');
    Route::get('/yape/revisarImagen', 'YapeController@revisarImagen');
    Route::get('/mainyape', function () {
        return view('yapepayment/yapepayment');
    })->name('mainyape');
  
   
});

Route::group(['middleware'=>['auth']],function(){
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController');
    //Notificaciones 
    Route::post('/notification/get', 'NotificationController@get'); 
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

 
    Route::group(['middelware' =>['RRHH']], function (){
        Route::get('/rrhh/marcaciones', 'RecursoHumanoController@marcaciones');
        Route::get('/rrhh/formaDePago', 'RecursoHumanoController@formaDePago');
        Route::get('/rrhh/obtenerAllFormasDePago', 'RecursoHumanoController@obtenerAllFormasDePago');
    });

    Route::group(['middleware' => ['Almacenero']], function () {
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarPdf','ArticuloController@listarPdf')->name('articulos_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');
        Route::get('/cliente/validarCliente', 'ClienteController@validarCliente');
 
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
       
        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}','VentaController@pdf')->name('venta_pdf');

        Route::get('/orden', 'OrdenController@index');
        Route::post('/orden/registrar', 'OrdenController@store');
        Route::put('/orden/desactivar', 'OrdenController@desactivar');
        Route::put('/orden/actualizar', 'OrdenController@actualizar');
        Route::put('/orden/cortesia', 'OrdenController@cortesia');
        Route::put('/orden/cambiarruta', 'OrdenController@cambiarruta');
        Route::get('/orden/obtenerCabecera', 'OrdenController@obtenerCabecera');
        Route::get('/orden/rptCajera', 'OrdenController@rptCajera');
        Route::get('/orden/obtenerDetalles', 'OrdenController@obtenerDetalles');
        Route::get('/orden/buscarConfiguracion', 'OrdenController@buscarConfiguracion');
        Route::get('/orden/consolidadoArticulo', 'OrdenController@consolidadoArticulo');
        Route::get('/orden/reportRutas', 'OrdenController@reportRutas');
        Route::get('/orden/obtenerRutas', 'OrdenController@obtenerRutas');
        Route::get('/orden/obtenerOrdenesRepetidas', 'OrdenController@obtenerOrdenesRepetidas');
        Route::get('/orden/obtenerComentario', 'OrdenController@obtenerComentario');
        Route::get('/orden/obtenerCabeceraAll', 'OrdenController@obtenerCabeceraAll');
        Route::get('/orden/pdf/{id}','OrdenController@pdf')->name('venta_pdf');
        Route::get('/orden/pdfAll/','OrdenController@pdfAll')->name('orden_pdf');
       
        Route::get('/rrhh/marcaciones', 'RecursoHumanoController@marcaciones');
        Route::get('/rrhh/formaDePago', 'RecursoHumanoController@formaDePago');
        Route::get('/rrhh/obtenerAllFormasDePago', 'RecursoHumanoController@obtenerAllFormasDePago');
        
    });

    Route::group(['middleware' => ['Administrador']], function () {
        
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/buscarArticuloPedido', 'ArticuloController@buscarArticuloPedido');
        Route::get('/articulo/listarArticuloPedido', 'ArticuloController@listarArticuloPedido');
        Route::get('/articulo/buscarModificador', 'ArticuloController@buscarModificador');
        Route::get('/articulo/mostrarDepartamento', 'ArticuloController@mostrarDepartamento');
        Route::get('/articulo/mostrarSeccion', 'ArticuloController@mostrarSeccion');
        Route::get('/articulo/mostrarArticuloReceta', 'ArticuloController@mostrarArticuloReceta');
        Route::get('/articulo/mostrarKitArticuloReceta', 'ArticuloController@mostrarKitArticuloReceta');
        Route::get('/articulo/buscarArtModificador', 'ArticuloController@buscarArtModificador');
        Route::get('/articulo/listarPdf','ArticuloController@listarPdf')->name('articulos_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::put('/cliente/updateEspecial', 'ClienteController@updateEspecial');

        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');
        Route::get('/cliente/validarCliente', 'ClienteController@validarCliente');
        Route::get('/cliente/getClienteId', 'ClienteController@getClienteId');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}','VentaController@pdf')->name('venta_pdf');

        Route::get('/orden', 'OrdenController@index');
        Route::post('/orden/registrar', 'OrdenController@store');
        Route::put('/orden/desactivar', 'OrdenController@desactivar');
        Route::put('/orden/actualizar', 'OrdenController@actualizar');
        Route::put('/orden/cortesia', 'OrdenController@cortesia');
        Route::put('/orden/cambiarruta', 'OrdenController@cambiarruta');
        Route::get('/orden/obtenerCabecera', 'OrdenController@obtenerCabecera');
        Route::get('/orden/reportCajera', 'OrdenController@reportCajera');
        Route::get('/orden/obtenerDetalles', 'OrdenController@obtenerDetalles');
        Route::get('/orden/consolidadoArticulo', 'OrdenController@consolidadoArticulo');
        Route::get('/orden/buscarConfiguracion', 'OrdenController@buscarConfiguracion');
        Route::get('/orden/consolidadoArticuloReceta', 'OrdenController@consolidadoArticuloReceta');
        Route::get('/orden/consolidadoArticuloSeccion', 'OrdenController@consolidadoArticuloSeccion');
        Route::get('/orden/reportRutas', 'OrdenController@reportRutas');
        Route::get('/orden/obtenerRutas', 'OrdenController@obtenerRutas');
        Route::get('/orden/obtenerPagos', 'OrdenController@obtenerPagos');
        Route::get('/orden/obtenerOrdenesRepetidas', 'OrdenController@obtenerOrdenesRepetidas');
        Route::get('/orden/obtenerComentario', 'OrdenController@obtenerComentario');
        Route::get('/orden/obtenerCabeceraAll', 'OrdenController@obtenerCabeceraAll');
        Route::get('/orden/obtenerInfoPorUsuarios', 'OrdenController@obtenerInfoPorUsuarios');
        Route::get('/orden/getExist', 'OrdenController@getExist');
        Route::get('/orden/personaStore', 'OrdenController@personaStore');
        Route::get('/orden/getClienteId', 'OrdenController@getClienteId');
        Route::get('/orden/pdf/{id}','OrdenController@pdf')->name('venta_pdf');
        Route::get('/orden/pdfAll/','OrdenController@pdfAll')->name('orden_pdf');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');

        Route::get('/rrhh/marcaciones', 'RecursoHumanoController@marcaciones');
        Route::get('/rrhh/formaDePago', 'RecursoHumanoController@formaDePago');
        Route::get('/rrhh/obtenerAllFormasDePago', 'RecursoHumanoController@obtenerAllFormasDePago');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
