<?php

namespace App\Livewire\Productos;

use Livewire\Component;

namespace App\Livewire\Productos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductosTable extends Component
{
    use WithPagination;

    protected ProductService $productService;

    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function render()
    {
        $productos = $this->productService
            ->getProductosForUser(Auth::user(), 5);

        return view('livewire.productos.productos-table', [
            'productos' => $productos,
        ]);
    }
}
