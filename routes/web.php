<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',  function () {
    return view('home');
})->name('home');
Route::resource('users', 'UsersController');
Route::resource('cars', 'CarsController');
Route::resource('concepts', 'ConceptsController');
Route::resource('workorders', 'WorkOrdersController');

Route::resource('invoices', 'InvoicesController');
Route::resource('clients', 'ClientsController');
Route::resource('facturas', 'FacturasController');
Route::resource('revision', 'CarRevisionController');

Route::get('facturatest/{factura}', function ($factura) {
    $factura = App\Factura::find(9);
    $img = asset('images/logo.png');
    $workorders = $factura->workorders;
    return view('facturas.factura', ['factura' => $factura, 'img'=>$img,
                                    'workorders' => $workorders]);
});
