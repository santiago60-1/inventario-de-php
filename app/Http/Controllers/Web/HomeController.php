<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $productos = Producto::all();
        return view('welcome', compact('productos'));
    }
}
