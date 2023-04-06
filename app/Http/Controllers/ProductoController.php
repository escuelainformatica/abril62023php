<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listar() 
    {
        $productos=Producto::with(["categoria"])->get();
        return view("productos", // resources/views/productos.blade.php
        ['productos'=>$productos]);
    }
}
