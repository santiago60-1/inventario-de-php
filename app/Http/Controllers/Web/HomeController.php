<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Welcome () {
        $productos = Producto::all();
        return view('welcome', compact('productos'));
    }
}
