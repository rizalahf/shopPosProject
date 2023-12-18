<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', App\Http\Controllers\HomeController::class);
// Route::get('/catalog', App\Http\Controllers\CatalogController::class);
// Route::get('/product', App\Http\Controllers\ProductController::class);
// Route::get('/suplier', App\Http\Controllers\SuplierController::class);
// Route::get('/transaction', App\Http\Controllers\TransactionController::class);

Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/catalog', App\Http\Controllers\CatalogController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);
Route::resource('/suplier', App\Http\Controllers\SuplierController::class);
Route::resource('/transaction', App\Http\Controllers\TransactionController::class);
//catalog
Route::get('/catalog/{id}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalog/{id}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalog/{id}', [App\Http\Controllers\CatalogController::class, 'destroy']);

//suplier
Route::get('/suplier/{id}/edit', [App\Http\Controllers\SuplierController::class, 'edit']);
Route::put('/suplier/{id}', [App\Http\Controllers\SuplierController::class, 'update']);
Route::delete('/suplier/{id}', [App\Http\Controllers\SuplierController::class, 'destroy']);

//transaction
Route::get('/transaction/{id}/edit', [App\Http\Controllers\TransactionController::class, 'edit']);
Route::put('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'update']);
Route::delete('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'destroy']);

//product
Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('/product/{id}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

