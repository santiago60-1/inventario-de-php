<?php

namespace App\Services;

use App\Models\Producto;
use App\DTOs\ProductInputDto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * Obtener productos según rol del usuario
     */
    public function getProductosForUser($user, int $perPage = 10)
    {
        $query = Producto::query()
            ->with(['user', 'categoria']) // 👈 para mostrar creador y categoría
            ->latest();

        // SOLO el admin ve todo
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        return $query->paginate($perPage);
    }



    /**
     * Obtener un producto por ID
     */
    public function getProductoById(int $id): Producto
    {
        return Producto::with(['user', 'categoria'])->findOrFail($id);
    }

    /**
     * Guardar un nuevo producto desde DTO
     */
    public function storeProducto(ProductInputDto $dto, array $fotos = []): Producto
    {
        $producto = Producto::create([
            'nombre'      => $dto->nombre,
            'descripcion' => $dto->descripcion,
            'precio'      => $dto->precio,
            'cantidad'    => $dto->cantidad,
            'categoria_id'=> $dto->categoria_id,
            'user_id'     => auth()->id(), // 🔐 ownership
        ]);

        $this->storeFotos($producto, $fotos);

        return $producto;
    }

    /**
     * Actualizar un producto desde DTO
     */
    public function updateProducto(int $id, ProductInputDto $dto, array $fotos = []): Producto
    {
        $producto = $this->getProductoById($id);

        $producto->update([
            'nombre'      => $dto->nombre,
            'descripcion' => $dto->descripcion,
            'precio'      => $dto->precio,
            'cantidad'    => $dto->cantidad,
            'categoria_id'=> $dto->categoria_id,
        ]);

        $this->storeFotos($producto, $fotos);

        return $producto;
    }

    /**
     * Eliminar un producto
     */
    public function delete(int $id): void
    {
        $producto = $this->getProductoById($id);
        $this->deleteFotos($producto);
        $producto->delete();
    }

    private function storeFotos(Producto $producto, array $fotos): void
    {
        $fotos = array_values(array_filter($fotos));
        if (empty($fotos)) {
            return;
        }

        $paths = [];
        foreach ($fotos as $foto) {
            if ($foto instanceof UploadedFile) {
                $paths[] = $foto->store("productos/{$producto->id}", 'public');
            }
        }

        if (empty($paths)) {
            return;
        }

        $existing = $producto->fotos ?? [];
        $producto->update([
            'fotos' => array_values(array_merge($existing, $paths)),
        ]);
    }

    private function deleteFotos(Producto $producto): void
    {
        $fotos = $producto->fotos ?? [];
        if (empty($fotos)) {
            return;
        }

        Storage::disk('public')->delete($fotos);
    }
}
