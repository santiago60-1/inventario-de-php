<?php

namespace App\Services;

use App\Models\Producto;
use App\DTOs\ProductInputDto;

class ProductService
{
    /**
     * Obtener productos según rol del usuario
     */
    public function getProductosForUser($user, int $perPage = 10)
    {
        $query = Producto::query()->latest();

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
        return Producto::findOrFail($id);
    }

    /**
     * Guardar un nuevo producto desde DTO
     */
    public function storeProducto(ProductInputDto $dto, $user): Producto
    {
        return Producto::create([
            'nombre'      => $dto->nombre,
            'descripcion' => $dto->descripcion,
            'precio'      => $dto->precio,
            'cantidad'    => $dto->cantidad,
            'user_id'     => $user->id, // 🔐 ownership
        ]);
    }

    /**
     * Actualizar un producto desde DTO
     */
    public function updateProducto(int $id, ProductInputDto $dto): Producto
    {
        $producto = $this->getProductoById($id);

        $producto->update([
            'nombre'      => $dto->nombre,
            'descripcion' => $dto->descripcion,
            'precio'      => $dto->precio,
            'cantidad'    => $dto->cantidad,
        ]);

        return $producto;
    }

    /**
     * Eliminar un producto
     */
    public function delete(int $id): void
    {
        $producto = $this->getProductoById($id);
        $producto->delete();
    }
}
