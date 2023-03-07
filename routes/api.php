<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Movie;  //Instanciamos el modelo Movie


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

Route::get('/movies', function () {
    return Movie::all();
});

Route::get('/movies/{id}', function ($id) {
    return Movie::find($id);
});

Route::post('/movies', function (Request $request) {
    return Movie::create($request->all());
});

