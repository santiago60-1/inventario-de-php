<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📋 Detalle del Producto
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold border-b-4 border-red-500 pb-4">
                    📦 Información del Producto
                </h1>

                <a href="{{ route('productos.index') }}"
                   class="w-full sm:w-auto text-center bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-medium">
                    ← Volver
                </a>
            </div>

            <!-- Tarjeta principal -->
            <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-8 mb-8">

                <!-- Nombre e ID -->
                <div class="mb-8">
                    <h2 class="text-3xl sm:text-5xl font-bold text-slate-800">
                        {{ $producto->nombre }}
                    </h2>
                    <p class="text-gray-500 text-base sm:text-lg mt-2">
                        <span class="font-semibold">ID:</span> #{{ $producto->id }}
                    </p>
                    <p class="text-gray-500 text-base sm:text-lg mt-2">
                        <span class="font-semibold">Categoría:</span>
                        {{ $producto->categoria_nombre ?? 'Sin categoría' }}
                    </p>
                </div>

                <!-- Grid info -->
                <div class="grid md:grid-cols-3 gap-4 sm:gap-6 mb-8">

                    <!-- Precio -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500 p-6 rounded-lg">
                        <p class="text-gray-600 text-sm font-semibold mb-2">💰 PRECIO</p>
                        <p class="text-2xl sm:text-4xl font-bold text-green-600">
                            ${{ number_format($producto->precio, 2) }}
                        </p>
                    </div>

                    <!-- Cantidad -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500 p-6 rounded-lg">
                        <p class="text-gray-600 text-sm font-semibold mb-2">📦 CANTIDAD</p>
                        <p class="text-2xl sm:text-4xl font-bold text-blue-600">
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
                        <p class="text-2xl sm:text-4xl font-bold text-purple-600">
                            ${{ number_format($producto->precio * $producto->cantidad, 2) }}
                        </p>
                    </div>
                </div>

                <!-- Fotos -->
                <div class="mb-8 border-t-2 border-gray-200 pt-8">
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4">
                        📷 Fotos del producto
                    </h3>

                    @php($fotos = $producto->fotos ?? [])
                    @if (count($fotos) > 0)
                        <div class="space-y-4">
                            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-50">
                                <img
                                    src="{{ asset('storage/' . $fotos[0]) }}"
                                    alt="Foto principal de {{ $producto->nombre }}"
                                    class="w-full h-64 sm:h-80 md:h-96 object-cover"
                                    loading="lazy"
                                />
                            </div>

                            @if (count($fotos) > 1)
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    @foreach (array_slice($fotos, 1) as $foto)
                                        <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-50">
                                            <img
                                                src="{{ asset('storage/' . $foto) }}"
                                                alt="Foto de {{ $producto->nombre }}"
                                                class="w-full h-28 sm:h-36 md:h-44 object-cover"
                                                loading="lazy"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-500 italic text-base sm:text-lg">
                            No hay fotos disponibles para este producto.
                        </p>
                    @endif
                </div>

                <!-- Descripción -->
                <div class="mb-8 border-t-2 border-gray-200 pt-8">
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4">
                        📝 Descripción
                    </h3>

                    @if ($producto->descripcion)
                        <p class="text-gray-700 text-base sm:text-lg leading-relaxed whitespace-pre-wrap bg-gray-50 p-4 sm:p-6 rounded-lg border-l-4 border-slate-400">
                            {{ $producto->descripcion }}
                        </p>
                    @else
                        <p class="text-gray-500 italic text-base sm:text-lg">
                            No hay descripción disponible para este producto.
                        </p>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-6 border-t-2 border-gray-200">

                    <a href="{{ route('productos.edit', $producto->id) }}"
                       class="w-full sm:w-auto justify-center bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition font-semibold flex items-center gap-2">
                        ✏️ Editar
                    </a>

                    <form action="{{ route('productos.destroy', $producto->id) }}"
                          method="POST"
                          class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <x-danger-button
                            type="submit"
                            onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                            class="w-full sm:w-auto justify-center flex items-center gap-2 rounded-lg bg-red-500 px-6 py-3 text-base font-semibold normal-case tracking-normal hover:bg-red-600"
                        >
                            🗑️ Eliminar
                        </x-danger-button>
                    </form>

                    <a href="{{ route('productos.index') }}"
                       class="w-full sm:w-auto justify-center bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition font-semibold flex items-center gap-2">
                        📋 Ver Lista
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
