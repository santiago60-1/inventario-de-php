<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\DTOs\ProductInputDto;
use App\DTOs\ProductOutputDto;
use App\Http\Requests\ProductRequest;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;


class ProductController extends Controller
{

    use AuthorizesRequests;

    public function __construct(
        private ProductService $productService
    ) {}

    // =========================
    // LISTAR PRODUCTOS
    // =========================
    public function index(User $user)
    {
        $this->authorize('viewAny', Producto::class);

        $productos = $this->productService
            ->getProductosForUser(auth()->user(), 5);

        return view('productos.index', compact('productos'));
    }


    // =========================
    // FORMULARIO CREAR
    // =========================
    public function create()
    {
        $this->authorize('create', Producto::class);

        return view('productos.create');
    }

    // =========================
    // GUARDAR PRODUCTO
    // =========================
    public function store(ProductRequest $request)
    {
        $this->authorize('create', Producto::class);

        $inputDto = ProductInputDto::fromRequest($request);
        $this->productService->storeProducto($inputDto);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }

    // =========================
    // VER PRODUCTO
    // =========================
    public function show(int $id)
    {
        $producto = $this->findProducto($id);

        $this->authorize('view', $producto);

        return view('productos.show', [
            'producto' => ProductOutputDto::fromModel($producto)
        ]);
    }

    // =========================
    // FORMULARIO EDITAR
    // =========================
    public function edit(int $id)
    {
        $producto = $this->findProducto($id);

        $this->authorize('update', $producto);

        return view('productos.edit', [
            'producto' => ProductOutputDto::fromModel($producto)
        ]);
    }

    // =========================
    // ACTUALIZAR PRODUCTO
    // =========================
    public function update(ProductRequest $request, int $id)
    {
        $producto = $this->findProducto($id);

        $this->authorize('update', $producto);

        $inputDto = ProductInputDto::fromRequest($request);
        $this->productService->updateProducto($id, $inputDto);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    // =========================
    // ELIMINAR PRODUCTO
    // =========================
    public function destroy(int $id)
    {
        $producto = $this->findProducto($id);

        $this->authorize('delete', $producto);

        $this->productService->delete($id);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente');
    }

    // =========================
    // MÉTODO PRIVADO REUTILIZABLE
    // =========================
    private function findProducto(int $id): Producto
    {
        return $this->productService->getProductoById($id);
    }
}
