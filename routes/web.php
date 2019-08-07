<?php

/*App\Concept::create([
  'concept' => 'revision a/c',
  'price' => 69.99,
  'brand' => 'bosch',
]);
$wo = App\WorkOrder::all();
foreach ($wo as $w){
  $w->total = $w->total($w->units);
  $w->update();
};*/

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
