<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ShowProductos() {
        return view("productos.index");
    }

    public function CrearProductos()  {
        return view("productos.create");
    }

    public function Formulario() {
      return view('formulario');
    }

    public function EditarProducto(){
        return view('productos.edit');
    }

    public function ShowFormularioActualizarProducto(){
        return view("formulario para actualizar");
    }

    public function BorrarProducto($id){
        return view("productos.delete");
    }
}
