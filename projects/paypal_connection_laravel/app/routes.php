<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'IndexController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'IndexController@getPaymentStatus',
));

// // this is after make the payment, PayPal redirect back to your site
// Route::get('product-page', array(
//     'as' => 'product-page',
//     'uses' => 'IndexController@index',
// ));

Route::get('productpage', 'IndexController@index');
