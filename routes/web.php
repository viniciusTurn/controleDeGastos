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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);

Route::group(['prefix' => 'products'], function(){
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/cadastro', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/salvar', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/editar/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/atualizar/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/excluir/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/listar', [App\Http\Controllers\ProductController::class, 'listar'])->name('products.listar');     
});


Route::get('/compra/', [App\Http\Controllers\ProductsEntryController::class, 'index'])->name('productsEntry.index');
Route::get('/compra/cadastro', [App\Http\Controllers\ProductsEntryController::class, 'create'])->name('productsEntry.create');
Route::post('/compra/salvar', [App\Http\Controllers\ProductsEntryController::class, 'store'])->name('productsEntry.store');
Route::get('/compra/editar/{productsEntry}', [App\Http\Controllers\ProductsEntryController::class, 'edit'])->name('productsEntry.edit');
Route::put('/compra/atualizar/{productsEntry}', [App\Http\Controllers\ProductsEntryController::class, 'update'])->name('productsEntry.update');
Route::delete('/compra/excluir/{productsEntry}', [App\Http\Controllers\ProductsEntryController::class, 'destroy'])->name('productsEntry.destroy');

Route::get('/venda/', [App\Http\Controllers\VendaProductController::class, 'index'])->name('vendaProducts.index');
Route::get('/venda/cadastro', [App\Http\Controllers\VendaProductController::class, 'create'])->name('vendaProducts.create');
Route::post('/venda/salvar', [App\Http\Controllers\VendaProductController::class, 'store'])->name('vendaProducts.store');
Route::get('/venda/editar/{productsEntry}', [App\Http\Controllers\VendaProductController::class, 'edit'])->name('vendaProducts.edit');
Route::put('/venda/atualizar/{productsEntry}', [App\Http\Controllers\VendaProductController::class, 'update'])->name('vendaProducts.update');
Route::delete('/venda/excluir/{productsEntry}', [App\Http\Controllers\VendaProductController::class, 'destroy'])->name('vendaProducts.destroy');


Route::get('/relatorio/', [App\Http\Controllers\ReportController::class, 'relatorioGastos'])->name('report.relatorioGastos');
Route::post('/relatorio/gerarGraficos', [App\Http\Controllers\ReportController::class, 'gerarGraficos'])->name('report.gerarGraficos');
