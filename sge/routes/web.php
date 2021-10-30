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
    
});


