<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite la petición (luego puedes meter permisos)
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:2|max:255',
            'descripcion' => 'nullable|string|max:2000',
            'precio' => 'required|numeric|min:0|max:9999999999999.99',
            'cantidad' => 'required|integer|min:0|max:9223372036854775807',
            'categoria_id' => 'required|exists:categorias,id',
            'fotos' => 'nullable|array|max:5',
            'fotos.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
