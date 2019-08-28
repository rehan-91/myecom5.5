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
	$cartItems = Cart::content();
	$categories = App\Category::all();
	$products = App\Product::paginate(4);
    return view('welcome', compact('products', 'categories', 'cartItems'));
});

/*Routes For Admin--*/

Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'admin', 'middleware' => ['admin','auth']],function(){
		Route::resource('/','AdminController');

		Route::resource('/product','ProductController');
		Route::resource('/category','CategoryController');

		Route::get('/allOrders','OrdersController@allOrders')->name('allOrders');
		Route::get('/pendingOrders','OrdersController@pendingOrders')->name('pendingOrders');
		Route::get('/deliveredOrders','OrdersController@deliveredOrders')->name('deliveredOrders');
});

Route::get('/category/{id}', 'CategoryController@showcategories')->name('showcategories');
Route::get('/products', 'ProductController@allproducts')->name('allproducts');
Route::get('/addToCart/{id}','CartController@addToCart')->name('addToCart');


/*  All product  */

//Middleware to restrict user without login access 
Route::group(['middleware' => ['auth']],function(){

/*  Cart Route  */

Route::get('/cart','CartController@cartIndex')->name('cartIndex');
Route::match(['put', 'patch'], '/cart/{cart}', 'CartController@updateCart')->name('updateCart');
Route::delete('/cart{id}','CartController@deleteItems')->name('deleteItems');

/* Payment Route */
Route::get('/payment', 'PaymentController@paymentMethod')->name('paymentMethod');

Route::get('/banktransfer', 'PaymentController@bankTransfer')->name('bankTransfer');
Route::post('/bankTransferSubmitOrder', 'PaymentController@bankTransferSubmitOrder')->name('bankTransferSubmitOrder');

Route::get('/paymentCard', 'PaymentController@paymentCard')->name('paymentCard');
Route::post('/paymentCardSubmitOrder', 'PaymentController@paymentCardSubmitOrder')->name('paymentCardSubmitOrder');

Route::get('/cashonDelivery', 'PaymentController@cashonDelivery')->name('cashonDelivery');
Route::post('/cashonDeliverySubmitOrder', 'PaymentController@cashonDeliverySubmitOrder')->name('cashonDeliverySubmitOrder');

Route::get('/thanks', 'PaymentController@thanks')->name('thanks');
});

Route::post('/OrderStatus/{id}', 'OrdersController@OrderStatus')->name('OrderStatus');

//Search Product
Route::post('search','SearchController@search')->name('search');