<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/products/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/cadastro', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products/salvar', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/editar/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/atualizar', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/products/excluir/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');