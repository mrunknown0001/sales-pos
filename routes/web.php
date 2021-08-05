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

use App\Configuracion;
Auth::routes();

/*
	-------------------------------------------------------
	RUTAS BACKEND
	-------------------------------------------------------
*/

// CAMBIO DE IDIOMA
Route::get('idioma/{locale}', function ($locale) {
		$id             = 1;
        $update         = Configuracion::find($id);
        $update->idioma = $locale;
        $update->save();
        return Redirect::back();
});

// AUTH
Route::get('/', 'LogearController@logear')->name('login');
Route::post('/', 'LogearController@authenticate')->name('post.login');
Route::get('/salir', 'LogearController@logout')->name('logout');
Route::get('/register', 'LogearController@show_registrar')->name('register');
Route::post('/registrar', 'LogearController@create_registrar')->name('post.register');
Route::get('/reset_pass', 'LogearController@show_reset_password');
Route::post('/reset_pass', 'LogearController@enviar_reset_password');
Route::get('/cambio_pass/{id}', 'LogearController@edit_reset_password');
Route::post('/cambio_pass/{id}', 'LogearController@update_reset_password');



Route::group(['middleware' => 'auth'], function () {
	// DASH
	Route::get('/dash', 'DashController@dash')->name('dash');

	// CONFIGURACION
	Route::prefix('configuracion')->group(function () {

	    // ROLES
	    Route::get('/roles', 'RolController@index')->name('roles');
	    Route::prefix('roles')->group(function () {
			// crear
			Route::get('/nuevo-rol', 'RolController@create')->name('role.new');
			// guardar
			Route::post('/nuevo-rol', 'RolController@store')->name('role.post.new');
			// mostrar
			Route::get('{id?}', 'RolController@show')->name('role.show');
			// edit
			Route::get('/editar-rol/{id?}', 'RolController@edit')->name('role.edit');
			// update
			Route::post('/editar-rol/{id?}', 'RolController@update')->name('role.post.update');
			// destroy
			Route::get('/destroy/{id}', 'RolController@destroy')->name('role.destroy');
		});

	    // Users
	    Route::get('/usuario', 'UsuarioController@index')->name('users');
    	Route::prefix('usuario')->group(function () {
			// crear
			Route::get('/nuevo-usuario', 'UsuarioController@create')->name('user.new');
			// guardar
			Route::post('/nuevo-usuario', 'UsuarioController@store')->name('user.post.new');
			// mostrar
			Route::get('{id?}', 'UsuarioController@show')->name('user.show');
			// edit
			Route::get('/editar-usuario/{id?}', 'UsuarioController@edit')->name('user.edit');
			// update
			Route::post('/editar-usuario/{id?}', 'UsuarioController@update')->name('user.post.update');
			// destroy
			Route::get('/destroy/{id?}', 'UsuarioController@destroy')->name('user.destroy');
			// status
			Route::get('/status_activar/{id?}', 'UsuarioController@status_activar');
			// status
			Route::get('/status_inactivar/{id?}', 'UsuarioController@status_inactivar');
		});

	    // PERMISOS
	    Route::get('/permisos', 'PermisoController@index');
	    Route::prefix('permiso')->group(function () {
			// ver
			Route::get('/show_permiso/{id}', 'PermisoController@show');
			// update
			Route::post('/show_permiso/{id}', 'PermisoController@update');
		});

	    // TRIBUTOS
	    Route::get('/tributos', 'TributoController@index');
	    Route::prefix('tributo')->group(function () {
			// crear
			Route::get('/nuevo-tributo', 'TributoController@create')->name('tax.new');
			// guardar
			Route::post('/nuevo-tributo', 'TributoController@store')->name('tax.post.new');
			// mostrar
			Route::get('{id?}', 'TributoController@show')->name('tax.show');
			// edit
			Route::get('/editar-tributo/{id?}', 'TributoController@edit')->name('tax.edit');
			// update
			Route::post('/editar-tributo/{id?}', 'TributoController@update')->name('tax.post.update');
			// destroy
			Route::get('/destroy/{id}', 'TributoController@destroy')->name('tax.destroy');
		});


	    // SISTEMA
	    Route::get('/configuracion', 'ConfiguracionController@edit')->name('config.edit');
	    Route::post('/configuracion', 'ConfiguracionController@update')->name('config.post.update');


	});


	//========================CATEGORIES MODULE=========================//
	Route::get('/categorias', 'CategoriaController@index')->name('categories');
	Route::get('/nueva-categoria', 'CategoriaController@create')->name('category.new');
	Route::post('/nueva-categoria', 'CategoriaController@store')->name('category.post.new');
	Route::get('/show_categoria/{id?}', 'CategoriaController@show')->name('category.show');
	Route::get('/editar_categoria/{id?}', 'CategoriaController@edit')->name('category.edit');
	Route::post('/editar_categoria/{id?}', 'CategoriaController@update')->name('category.post.update');
	Route::get('/borrar_categoria/{id?}', 'CategoriaController@destroy')->name('category.destroy');



	//========================SUB-CATEGORY MODULES=========================//
	Route::get('/subcategorias', 'SubCategoriaController@index')->name('subcat');
	Route::get('/nueva-subcategoria', 'SubCategoriaController@create')->name('subcat.new');
	Route::post('/nueva-subcategoria', 'SubCategoriaController@store')->name('subcat.post.new');
	Route::get('/show_subcategoria/{id?}', 'SubCategoriaController@show')->name('subcat.show');
	Route::get('/editar_subcategoria/{id?}', 'SubCategoriaController@edit')->name('subcat.edit');
	Route::post('/editar_subcategoria/{id?}', 'SubCategoriaController@update')->name('subcat.post.update');
	Route::get('/borrar_subcategoria/{id?}', 'SubCategoriaController@destroy')->name('subcat.destroy');


	//========================SALES MODULE=========================//
	Route::get('/ventas_pendientes', 'VentaController@index_pendientes')->name('sales.pending');
	Route::get('/ventas_rechazadas', 'VentaController@index_rechazadas')->name('sales.reject');
	Route::get('/ventas_aprobadas', 'VentaController@index_aprobadas')->name('sales.approved');
	Route::post('/aprobar_venta', 'VentaController@update_aprobar_status')->name('sales.post.aprprove');
	Route::post('/rechazar_venta', 'VentaController@update_rechazar_status')->name('sales.post.reject');
	Route::get('/sales', 'VentaController@create')->name('sales');

	//========================PRODUCT MODULES=========================//
	Route::get('/products', 'ProductoController@index')->name('products');
	Route::get('/nuevo-producto', 'ProductoController@create')->name('product.new');
	Route::post('/nuevo-producto', 'ProductoController@store')->name('product.post.new');
	Route::get('/show_producto/{id?}', 'ProductoController@show')->name('product.show');
	Route::get('/editar_producto/{id?}', 'ProductoController@edit')->name('product.edit');
	Route::post('/editar_producto/{id?}', 'ProductoController@update')->name('product.post.update');
	Route::get('/borrar_producto/{id?}', 'ProductoController@destroy')->name('product.destroy');
	Route::post('/cargar_subcategoria', 'ProductoController@cargar_subcategoria')->name('product.category.load');//REGISTRAR PRODUCTO
	Route::post('/cargar_subcategoria2', 'ProductoController@cargar_subcategoria2')->name('product.subcat.load');//EDITAR 

	//========================KARDEX===========================//
	Route::get('/kardex', 'KardexController@index')->name('kardex');

	//========================PURCHASE MODULE=========================//
	Route::get('/compras_pendientes', 'CompraController@index_pendientes');
	Route::get('/compras_rechazadas', 'CompraController@index_rechazadas');
	Route::get('/compras_aprobadas', 'CompraController@index_aprobadas');
	Route::get('/purchase', 'CompraController@create')->name('purchase');
	Route::post('/aprobar_compra', 'CompraController@update_aprobar_status');
	Route::post('/rechazar_compra', 'CompraController@update_rechazar_status');


	//========================CLIENT MODULES=========================//
	Route::get('/clientes', 'ClienteController@index')->name('clients');
	Route::get('/nuevo-cliente', 'ClienteController@create')->name('client.new');
	Route::post('/nuevo-cliente', 'ClienteController@store')->name('client.post.new');
	Route::get('/show_cliente/{id?}', 'ClienteController@show')->name('client.show');
	Route::get('/editar_cliente/{id?}', 'ClienteController@edit')->name('client.edit');
	Route::post('/editar_cliente/{id?}', 'ClienteController@update')->name('client.post.edit');
	Route::get('/borrar_cliente/{id?}', 'ClienteController@destroy')->name('client.destroy');

	//=========================PROVIDERS MODULE========================//
	Route::get('/proveedores', 'ProveedorController@index')->name('providers');
	Route::get('/nuevo-proveedor', 'ProveedorController@create')->name('provider.new');
	Route::post('/nuevo-proveedor', 'ProveedorController@store')->name('provider.post.new');
	Route::get('/show_proveedor/{id?}', 'ProveedorController@show')->middleware('auth');
	Route::get('/editar_proveedor/{id?}', 'ProveedorController@edit')->middleware('auth');
	Route::post('/editar_proveedor/{id?}', 'ProveedorController@update')->middleware('auth');
	Route::get('/borrar_proveedor/{id?}', 'ProveedorController@destroy')->middleware('auth');

});




//========================MODULO:GASTOS=========================//
Route::get('/gastos', 'GastoController@index')->middleware('auth');
Route::get('/nuevo-gasto', 'GastoController@create')->middleware('auth');
Route::post('/nuevo-gasto', 'GastoController@store')->middleware('auth');
Route::get('/show_gasto/{id?}', 'GastoController@show')->middleware('auth');
Route::get('/borrar_gasto/{id?}', 'GastoController@destroy')->middleware('auth');
Route::get('/editar_gasto/{id?}', 'GastoController@edit')->middleware('auth');
Route::post('/editar_gasto/{id?}', 'GastoController@update')->middleware('auth');





//========================API POST VENTA=========================//
Route::get('/venta_cargar_lista_productos', 'VentaController@pos_cargar_lista_productos')->middleware('auth');
Route::get('/venta_buscar_productos', 'VentaController@pos_buscar_productos')->middleware('auth');
Route::get('/venta_insertar_producto_temporal', 'VentaController@pos_insertar_producto_temporal')->middleware('auth');
Route::get('/venta_cargar_lista_productos_temporal', 'VentaController@pos_cargar_lista_productos_temporal')->middleware('auth');
Route::get('/venta_eliminar_producto_temporal', 'VentaController@pos_eliminar_producto_temporal')->middleware('auth');
Route::get('/venta_descuento', 'VentaController@pos_descuento')->middleware('auth');
Route::get('/venta_total', 'VentaController@pos_total')->middleware('auth');
Route::get('/venta_procesar_compra', 'VentaController@pos_procesar')->middleware('auth');
Route::get('/venta_vaciar_lista_principal', 'VentaController@pos_vaciar_lista_principal')->middleware('auth');


//========================API POST COMPRA=========================//
Route::get('/compra_cargar_lista_productos', 'CompraController@pos_cargar_lista_productos')->middleware('auth');
Route::get('/compra_buscar_productos', 'CompraController@pos_buscar_productos')->middleware('auth');
Route::get('/compra_insertar_producto_temporal', 'CompraController@pos_insertar_producto_temporal')->middleware('auth');
Route::get('/compra_cargar_lista_productos_temporal', 'CompraController@pos_cargar_lista_productos_temporal')->middleware('auth');
Route::get('/compra_eliminar_producto_temporal', 'CompraController@pos_eliminar_producto_temporal')->middleware('auth');
Route::get('/compra_descuento', 'CompraController@pos_descuento')->middleware('auth');
Route::get('/compra_total', 'CompraController@pos_total')->middleware('auth');
Route::get('/compra_procesar_compra', 'CompraController@pos_procesar')->middleware('auth');
Route::get('/compra_vaciar_lista_principal', 'CompraController@pos_vaciar_lista_principal')->middleware('auth');

//========================IMPRESIONES PDF=========================//
Route::get('/pdf_prductos', 'ProductoController@pdf')->middleware('auth');
Route::get('/csv_un_prducto/{id?}', 'ProductoController@un_producto_pdf')->middleware('auth');
Route::get('/pdf_clientes', 'ClienteController@pdf')->middleware('auth');
Route::get('/pdf_proveedores', 'ProveedorController@pdf')->middleware('auth');
Route::get('/pdf_usuarios', 'UsuarioController@pdf')->middleware('auth');
Route::get('/pdf_compras', 'CompraController@pdf')->middleware('auth');
Route::get('/pdf_ventas_rechazadas', 'VentaController@pdf_rechazadas')->middleware('auth');
Route::get('/pdf_ventas_pendientes', 'VentaController@pdf_pendientes')->middleware('auth');
Route::get('/pdf_ventas_aprobadas', 'VentaController@pdf_aprobadas')->middleware('auth');
Route::get('/pdf_compras_rechazadas', 'CompraController@pdf_rechazadas')->middleware('auth');
Route::get('/pdf_compras_pendientes', 'CompraController@pdf_pendientes')->middleware('auth');
Route::get('/pdf_compras_aprobadas', 'CompraController@pdf_aprobadas')->middleware('auth');
Route::get('/pdf_ventas_factura/{id?}', 'VentaController@pdf_factura')->middleware('auth');
Route::get('/pdf_compras_factura/{id?}', 'CompraController@pdf_factura')->middleware('auth');
Route::get('/pdf_gastos', 'GastoController@pdf')->middleware('auth');
Route::get('/pdf_kardex', 'KardexController@pdf')->middleware('auth');

//========================IMPRESIONES CSV=========================//
Route::get('/csv_prductos', 'ProductoController@csv')->middleware('auth');
Route::get('/csv_ventas_pendientes', 'VentaController@csv_pendientes')->middleware('auth');
Route::get('/csv_ventas_rechazadas', 'VentaController@csv_rechazadas')->middleware('auth');
Route::get('/csv_ventas_aprobadas', 'VentaController@csv_aprobadas')->middleware('auth');
Route::get('/csv_compras_pendientes', 'CompraController@csv_pendientes')->middleware('auth');
Route::get('/csv_compras_rechazadas', 'CompraController@csv_rechazadas')->middleware('auth');
Route::get('/csv_compras_aprobadas', 'CompraController@csv_aprobadas')->middleware('auth');
Route::get('/csv_compras', 'CompraController@csv')->middleware('auth');
Route::get('/csv_gastos', 'GastoController@csv')->middleware('auth');
Route::get('/csv_kardex', 'KardexController@csv')->middleware('auth');
Route::get('/csv_clientes', 'ClienteController@csv')->middleware('auth');
Route::get('/csv_proveedores', 'ProveedorController@csv')->middleware('auth');

//========================REPORTES DE VENTAS=========================//
Route::post('/modal_reporte_ventas_filtrar', 'ReporteController@modal_reporte_ventas_filtrar')->middleware('auth');
Route::get('/pdf_reporte_ventas/{desde?}/{hasta?}/{status?}', 'ReporteController@pdf_reporte_ventas')->middleware('auth');
Route::get('/csv_reporte_ventas/{desde?}/{hasta?}/{status?}', 'ReporteController@csv_reporte_ventas')->middleware('auth');
Route::get('/csv_reporte_compras/{desde?}/{hasta?}/{status?}', 'ReporteController@csv_reporte_compras')->middleware('auth');
Route::get('/csv_reporte_gastos/{desde?}/{hasta?}', 'ReporteController@csv_reporte_gastos')->middleware('auth');

//========================REPORTES DE COMPRAS=========================//
Route::post('/modal_reporte_compras_filtrar', 'ReporteController@modal_reporte_compras_filtrar')->middleware('auth');
Route::get('/pdf_reporte_compras/{desde?}/{hasta?}/{status?}', 'ReporteController@pdf_reporte_compras')->middleware('auth');

//========================REPORTES DE GASTOS=========================//
Route::post('/modal_reporte_gastos_filtrar', 'ReporteController@modal_reporte_gastos_filtrar')->middleware('auth');
Route::get('/pdf_reporte_gastos/{desde?}/{hasta?}', 'ReporteController@pdf_reporte_gastos')->middleware('auth');