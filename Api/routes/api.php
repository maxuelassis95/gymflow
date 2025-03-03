<?php

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teste', function() {
    //mensagem_retorno();

    return json_encode(mensagem_retorno("Ola mundo", 200));
});

function mensagem_retorno($cod, $msg) : array {
    $mensagem = array([
        'msg' => $msg,
        'cod' => $cod,
    ]);

    return $mensagem;
}
