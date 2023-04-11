<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class ProductoController extends Controller
{
    public Request $req;
    public function __construct(Request $req) {
        $this->req=$req;
    }
    public function listar() 
    {
        $productos=Producto::with(["categoria"])->get();
        // return View::make("productos", ['productos'=>$productos]);
        return view("productos", ['productos'=>$productos]); // resources/views/productos.blade.php
    }
    public function obtener(int $id=1) 
    {
        $prod=Producto::find($id); // llave primaria id
        dump($prod);
    }
    
    public function insertar2() 
    {
        if($this->req->isMethod("POST")) {
            try {
                $producto=new Producto($this->req->all(['name','descripcion','precio','categoria_id']));
                $producto->save();
                return redirect()->route("productolistar");
            } catch(Exception $ex) {        
                $mensaje=config('app.debug') ? $ex->getMessage() : "no se pudo insertar";
            }
        } else {
            $producto=new Producto();
            $mensaje="";
        }
        return view("producto.insertar",  // resources/views/productos/insertar.blade.php
        ['producto'=>$producto,'mensaje'=>$mensaje]);
    }
    public function insertar(Producto $producto) 
    {
        //$producto=new Producto();
        return view("producto.insertar",  // resources/views/productos/insertar.blade.php
        ['producto'=>$producto]);
    }
    public function insertarPost()
    {
        //dump($this->req->all());
        /*$producto=new Producto();
            $producto->name=$this->req("name");
        */
        $producto=new Producto($this->req->all(['id','name','descripcion','precio','categoria_id']));
        //dump($producto);
        return view("producto.insertar",  // resources/views/productos/insertar.blade.php
        ['producto'=>$producto]);

    }

    public function modificar() 
    {
    }
}
 