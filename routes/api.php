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

Route::put('/movies/{id}', function (Request $request, $id) {
    $movie = Movie::findOrFail($id);
    $movie->update($request->all());

    return $movie;
});

Route::delete('/movies/{id}', function ($id) {
    Movie::find($id)->delete();

    return 204; //204 es el código de respuesta HTTP para una solicitud exitosa que no devuelve contenido
});

