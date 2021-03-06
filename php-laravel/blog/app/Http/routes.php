<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Authentication created with:
   php artisan make:auth
   php artisan migrate
   the later command execute the SQL statements
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    echo 'Hello ' . $name . '!';
});

Route::get('/customer/{id}', 'CustomerController@customer');

Route::get('/orders', function () {
    $orders = App\Order::all();
    foreach($orders as $order) {
        echo $order->name . " by " . $order->customer->name . "<br/>";
    }
});

Route::get('sample_view', function() {
    $data = array(
        'var1' => 'Hamburger',
        'var2' => 'Hot Dog',
        'var3' => 'Ninja'
    );
    return view('sample_view', $data);
});

Route::get('sample_blade', function() {
    $data = array(
        'var1' => 'Hamburger',
        'var2' => 'Hot Dog',
        'var3' => 'Ninja',
        'orders' => App\Order::all()
    );
    return view('sample_blade', $data);
});

Route::auth();

Route::get('/home', 'HomeController@index');
