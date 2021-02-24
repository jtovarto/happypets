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
use Illuminate\Http\RedirectResponse;

////////////////////////////////////////////////////////////////////////////////
/////    - R U T A S - A D M I N I S T R A D O R - D E L - S I T I O -    /////
////////////////////////////////////////////////////////////////////////////////
Auth::routes(['register' => false]);

Route::prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('/dashboard', 'DashboardController')->name('dashboard');
	Route::get('/', 'DashboardController')->name('dashboard');
	Route::post('/ordenes/historial'    ,'comprasController@orderHistory')->name('orders-history');
	Route::get ('/ordenes/historial'    ,'comprasController@orderHistory')->name('orders-history');
	Route::get ('/ordenes/pendientes'   , 'comprasController@shipping'    )->name('orders-pending');
	Route::get ('/orden/{ref}/mostrar'  , 'comprasController@show'        )->name('order-show');
	Route::get ('/orden/{ref}/envio'    , 'comprasController@formShipping')->name('form-shipping');
	Route::post('/orden/registrar/envio', 'comprasController@saveShipping')->name('save-shipping');
	Route::post('/orden/cancelar'     ,'comprasController@cancelShipping')->name('cancel-shipping');
	Route::get('/reportes/ordenes'      ,'comprasController@reportOrders' )->name('report-orders');
    //Route::resource('/producto', 'ProductosController');
});


////////////////////////////////////////////////////////////////////////////////
/////                  - R U T A S - S I T I O - W E B -                  /////
////////////////////////////////////////////////////////////////////////////////

Route::get('/', 'mainController@home')->name('home');
Route::get('/inicio', 'mainController@home')->name('home');

Route::view('/nosotros', 'pages.nosotros')->name('nosotros');
Route::get('/producto/{id}','ProductosController@show')->name('producto');
Route::get('/carrito', 'cartController@show_car')->name('carrito');
Route::get('/checkout', 'mainController@checkout')->name('checkout');
Route::view('/contacto','pages.contacto')->name('contacto');
Route::view('/contacto/{dpto}','pages.contacto')->name('contacto-dpto');

Route::get('/respuesta','mainController@respuesta')->name('respuesta');

Route::post('/mailing', 'mainController@mailing')->name('mailing');

Route::view('/consulta','pages.consulta')->name('consulta');
Route::get('/consultarOrden','comprasController@consultarOrden')->name('consultarOrdenAux');
Route::get('/consultarOrden/{id}','comprasController@consultarOrden')->name('consultarOrden');

	

//RUTA DE LA SECCION CARRITO DE COMPRAS
Route::prefix('carrito')->group(function () {
	Route::get('/lista','cartController@show_car')->name('carList');
	Route::get('/add_item/{id}','cartController@add_item')->name('anadirItem');
	Route::get('/update_item/{rowId}/{qty}','cartController@update_car')->name('updateItem');
	Route::get('/update_item','cartController@update_car')->name('updateItem1');
	Route::get('/remove_item/{rowId}','cartController@remove_item')->name('removerItem');
});


Route::post('enviar-email','mainController@send_mail')->name('enviar-email');


