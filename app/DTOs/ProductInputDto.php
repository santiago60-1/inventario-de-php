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
        public ?int $userId = null,
    ) {}

    public static function fromRequest(Request $request): self {
        return new self(
            nombre: $request->input('nombre'),
            descripcion: $request->input('descripcion') ?? '',
            precio: (float) $request->input('precio'),
            cantidad: (int) $request->input('cantidad'),
            userId: (int) $request->input('user_id'),
        );
    }
}
