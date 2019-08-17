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

Route::get('facturatest', function () {
    return view('facturas.factura');
});
