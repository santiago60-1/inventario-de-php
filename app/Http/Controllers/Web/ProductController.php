<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\DTOs\ProductInputDto;
use App\DTOs\ProductOutputDto;
use App\Http\Requests\ProductRequest;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    // =========================
    // MOSTRAR TODOS LOS PRODUCTOS
    // =========================
public function index()
{
    $user = Auth::user();

    $productosPaginados = $this->productService
        ->getProductosForUser($user, 5);

    $productosDto = $productosPaginados
        ->getCollection()
        ->map(fn ($producto) => ProductOutputDto::fromModel($producto));

    $productosPaginados->setCollection($productosDto);

    return view('productos.index', [
        'productos' => $productosPaginados
    ]);
}




    // =========================
    // MOSTRAR FORMULARIO CREAR
    // =========================
    public function create()
    {
        return view('productos.create');
    }

    // =========================
    // MOSTRAR DETALLE DEL PRODUCTO
    // =========================
    public function show(int $id)
    {
        $producto = $this->productService->getProductoById($id);

        $productoDto = ProductOutputDto::fromModel($producto);

        return view('productos.show', [
            'producto' => $productoDto
        ]);
    }

    // =========================
    // GUARDAR PRODUCTO (CREATE)
    // =========================
    public function storeProducto(ProductRequest $request)
    {


        // DTO DE ENTRADA
        $inputDto = ProductInputDto::fromRequest($request);

        $producto = $this->productService->storeProducto($inputDto);

        // DTO DE SALIDA (por consistencia)
        $productoDto = ProductOutputDto::fromModel($producto);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }

    // =========================
    // MOSTRAR FORMULARIO EDITAR
    // =========================
    public function editarProducto(int $id)
    {
        $producto = $this->productService->getProductoById($id);

        $productoDto = ProductOutputDto::fromModel($producto);

        return view('productos.edit', [
            'producto' => $productoDto
        ]);
    }

    // =========================
    // MOSTRAR FORMULARIO ACTUALIZAR (ALTERNATIVA)
    // =========================
    public function update(int $id)
    {
        $producto = $this->productService->getProductoById($id);

        $productoDto = ProductOutputDto::fromModel($producto);

        return view('productos.formulario.actualizar', [
            'producto' => $productoDto
        ]);
    }

    // =========================
    // ACTUALIZAR PRODUCTO (UPDATE)
    // =========================
    public function updateProducto(ProductRequest $request, int $id)
    {

        // DTO DE ENTRADA
        $inputDto = ProductInputDto::fromRequest($request);

        $this->productService->updateProducto($id, $inputDto);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    // =========================
    // ELIMINAR PRODUCTO (DELETE)
    // =========================
    public function delete(int $id)
    {
        $this->productService->delete($id);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente');
    }


}
