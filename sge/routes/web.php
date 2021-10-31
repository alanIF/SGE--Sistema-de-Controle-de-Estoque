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
Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/produtos',  [App\Http\Controllers\ProdutoController::class, 'index']);
    Route::get('/produtos/new',  [App\Http\Controllers\ProdutoController::class, 'new']);
    Route::post('/produtos/add',  [App\Http\Controllers\ProdutoController::class, 'add']);
    Route::post('/produtos/update/{id}',  [App\Http\Controllers\ProdutoController::class, 'update']);
    Route::get('/produtos/{id}/edit',  [App\Http\Controllers\ProdutoController::class, 'edit']);
    Route::delete('/produtos/delete/{id}',  [App\Http\Controllers\ProdutoController::class, 'delete']);

    Route::get('/entradas',  [App\Http\Controllers\EntradaController::class, 'index']);
    Route::get('/entradas/new',  [App\Http\Controllers\EntradaController::class, 'new']);
    Route::post('/entradas/add',  [App\Http\Controllers\EntradaController::class, 'add']);
    Route::post('/entradas/update/{id}',  [App\Http\Controllers\EntradaController::class, 'update']);
    Route::get('/entradas/{id}/edit',  [App\Http\Controllers\EntradaController::class, 'edit']);
    Route::delete('/entradas/delete/{id}',  [App\Http\Controllers\EntradaController::class, 'delete']);

    Route::get('/saidas',  [App\Http\Controllers\SaidaController::class, 'index']);
    Route::get('/saidas/new',  [App\Http\Controllers\SaidaController::class, 'new']);
    Route::post('/saidas/add',  [App\Http\Controllers\SaidaController::class, 'add']);
    Route::post('/saidas/update/{id}',  [App\Http\Controllers\SaidaController::class, 'update']);
    Route::get('/saidas/{id}/edit',  [App\Http\Controllers\SaidaController::class, 'edit']);
    Route::delete('/saidas/delete/{id}',  [App\Http\Controllers\SaidaController::class, 'delete']);

    Route::get('/relatorios',  [App\Http\Controllers\RelatorioController::class, 'index']);

});


