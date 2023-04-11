<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware()-><verbo>(ruta,funcion)


/*
Route::group(["producto"],function(){
    Route::get('/', [ProductoController::class,'listar']);
    Route::get('/obtener/{id?}',[ProductoController::class,'obtener'])
        ->where('id', '[0-9]+')
        ->name("obtenerproducto");
});
*/
Route::controller(ProductoController::class)
    ->prefix("producto")
    ->group(function () {
        Route::get('/', 'listar')->name("productolistar"); // producto/listar
        Route::get('/insertar/', 'insertar'); // producto/listar
        Route::post('/insertar/', 'insertarpost')->name("productoinsertar"); // producto/listar
        Route::any('/insertar2/', 'insertar2')->name("productoinsertar2");
        Route::post('/obtener/{id?}', 'obtener')->whereNumber("id"); // producto/obtener/222
    });

// 1) crea una instancia de ProductoController
// $con=new ProductoController($req);
// 2) llama al metodo.


