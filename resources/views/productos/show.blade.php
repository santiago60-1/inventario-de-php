<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📋 Detalle del Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold border-b-4 border-red-500 pb-4">
                    📦 Información del Producto
                </h1>

                <a href="{{ route('productos.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-medium">
                    ← Volver
                </a>
            </div>

            <!-- Tarjeta principal -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">

                <!-- Nombre e ID -->
                <div class="mb-8">
                    <h2 class="text-5xl font-bold text-slate-800">
                        {{ $producto->nombre }}
                    </h2>
                    <p class="text-gray-500 text-lg mt-2">
                        <span class="font-semibold">ID:</span> #{{ $producto->id }}
                    </p>
                    <p class="text-gray-500 text-lg mt-2">
                        <span class="font-semibold">Categoría:</span>
                        {{ $producto->categoria_nombre ?? 'Sin categoría' }}
                    </p>
                </div>

                <!-- Grid info -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">

                    <!-- Precio -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500 p-6 rounded-lg">
                        <p class="text-gray-600 text-sm font-semibold mb-2">💰 PRECIO</p>
                        <p class="text-4xl font-bold text-green-600">
                            ${{ number_format($producto->precio, 2) }}
                        </p>
                    </div>

                    <!-- Cantidad -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500 p-6 rounded-lg">
                        <p class="text-gray-600 text-sm font-semibold mb-2">📦 CANTIDAD</p>
                        <p class="text-4xl font-bold text-blue-600">
                            {{ $producto->cantidad }}
                        </p>
                        <p class="text-gray-600 text-sm mt-2">
                            @if ($producto->cantidad > 0)
                                <span class="text-green-600 font-semibold">✓ En Stock</span>
                            @else
                                <span class="text-red-600 font-semibold">✗ Sin Stock</span>
                            @endif
                        </p>
                    </div>

                    <!-- Valor total -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-l-4 border-purple-500 p-6 rounded-lg">
                        <p class="text-gray-600 text-sm font-semibold mb-2">💵 VALOR TOTAL</p>
                        <p class="text-4xl font-bold text-purple-600">
                            ${{ number_format($producto->precio * $producto->cantidad, 2) }}
                        </p>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="mb-8 border-t-2 border-gray-200 pt-8">
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">
                        📝 Descripción
                    </h3>

                    @if ($producto->descripcion)
                        <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-wrap bg-gray-50 p-6 rounded-lg border-l-4 border-slate-400">
                            {{ $producto->descripcion }}
                        </p>
                    @else
                        <p class="text-gray-500 italic text-lg">
                            No hay descripción disponible para este producto.
                        </p>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="flex gap-4 flex-wrap pt-6 border-t-2 border-gray-200">

                    <a href="{{ route('productos.edit', $producto->id) }}"
                       class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition font-semibold flex items-center gap-2">
                        ✏️ Editar
                    </a>

                    <form action="{{ route('productos.destroy', $producto->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button
                            type="submit"
                            onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                            class="flex items-center gap-2 rounded-lg bg-red-500 px-6 py-3 text-base font-semibold normal-case tracking-normal hover:bg-red-600"
                        >
                            🗑️ Eliminar
                        </x-danger-button>
                    </form>

                    <a href="{{ route('productos.index') }}"
                       class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition font-semibold flex items-center gap-2">
                        📋 Ver Lista
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
