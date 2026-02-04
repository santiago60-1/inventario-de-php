<?php

namespace App\DTOs;
use Illuminate\Http\Request;


class ProductInputDto
{
    public function __construct(
        public string $nombre,
        public ?string $descripcion,
        public float $precio,
        public int $cantidad,
        public ?int $categoria_id,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $categoriaId = $request->input('categoria_id');

        return new self(
            nombre: $request->input('nombre'),
            descripcion: $request->input('descripcion'),
            precio: (float) $request->input('precio'),
            cantidad: (int) $request->input('cantidad'),
            categoria_id: $categoriaId !== null && $categoriaId !== ''
                ? (int) $categoriaId
                : null,
        );
    }
}
