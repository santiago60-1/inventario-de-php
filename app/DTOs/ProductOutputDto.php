<?php

namespace App\DTOs;

use App\Models\Producto;

class ProductOutputDto
{
    public function __construct(
        public int $id,
        public string $nombre,
        public string $descripcion,
        public float $precio,
        public int $cantidad
    ) {}

    public static function fromModel(Producto $producto): self
    {
        return new self(
            id: $producto->id,
            nombre: $producto->nombre,
            descripcion: $producto->descripcion,
            precio: $producto->precio,
            cantidad: $producto->cantidad
        );
    }
}
