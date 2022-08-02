<?php

use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\PedidoProdutosController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('pedidos', PedidoController::class);

Route::post('pedido_produtos', [PedidoProdutosController::class, 'store']);
Route::delete('pedido_produtos/{id}', [PedidoProdutosController::class, 'destroy']);
