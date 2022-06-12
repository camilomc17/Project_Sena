<?php

use App\Http\Controllers\Acta_Entrega_controller;
use App\Http\Controllers\Prestamo_controller;
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
          //creo ruta cualquiera//llamo al controlador  //llamo el metodo
Route::get('/prestamo',[Prestamo_controller::class,'index']);
//busca por Id 
Route::get('/prestamo_show/{id}',[Prestamo_controller::class,'show']);
Route::post('/prestamo_store',[Prestamo_controller::class,'store']);
Route::put('/prestamo_update/{id}',[Prestamo_controller::class,'update']);
Route::delete('/prestamo_destroy/{id}',[Prestamo_controller::class,'destroy']);
//------------------------------------------------------------------------------\\
Route::get('/acta_entrega_index',[Acta_Entrega_controller::class,'index']);
Route::get('/acta_entrega_show/{id}',[Acta_Entrega_controller::class,'show']);
Route::post('/acta_entrega_store',[Acta_Entrega_controller::class,'store']);
Route::put('/acata_entrega_update/{id}',[Acta_Entrega_controller::class,'update']);
Route::delete('/acata_entrega_destroy/{id}',[Acta_Entrega_controller::class,'destroy']);

?>