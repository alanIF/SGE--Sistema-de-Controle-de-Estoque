<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoAPIController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('produto_a', [ProdutoAPIController::class, 'index']);

Route::get('produto_a/{id}', [ProdutoAPIController::class, 'show']);

Route::post('produto_a', [ProdutoAPIController::class, 'store']);

Route::put('produto_a/{id}', [ProdutoAPIController::class, 'update']);

Route::delete('produto_a/{id}', [ProdutoAPIControlle::class,'destroy']);