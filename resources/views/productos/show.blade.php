<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle - {{ $producto->nombre }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- HEADER -->
    <header class="bg-gradient-to-r from-slate-800 to-slate-900 text-white py-6 px-6 shadow-lg">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-bold">📦 Sistema de Inventario</h1>
        </div>
    </header>

    <!-- NAV -->
    <nav class="bg-slate-700 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto">
            <ul class="flex">
                <li>
                    <a href="{{ route('home.index') }}"
                       class="block px-6 py-4 text-white hover:bg-slate-600 transition-colors font-medium">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos.index') }}"
                       class="block px-6 py-4 text-white hover:bg-slate-600 transition-colors font-medium">
                        Ver Productos
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos.create') }}"
                       class="block px-6 py-4 text-white hover:bg-slate-600 transition-colors font-medium">
                        Crear Producto
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- MAIN -->
    <main class="max-w-4xl mx-auto px-4 py-8 flex-1">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold border-b-4 border-red-500 pb-4">
                📋 Detalle del Producto
            </h1>
            <a href="{{ route('productos.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-medium">
                ← Volver
            </a>
        </div>

        <!-- TARJETA DE DETALLE -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <!-- ID y Nombre -->
            <div class="mb-8">
                <h2 class="text-5xl font-bold text-slate-800">{{ $producto->nombre }}</h2>
                <p class="text-gray-500 text-lg mt-2">
                    <span class="font-semibold">ID:</span> #{{ $producto->id }}
                </p>
            </div>

            <!-- Grid de información -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <!-- Precio -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500 p-6 rounded-lg">
                    <p class="text-gray-600 text-sm font-semibold mb-2">💰 PRECIO</p>
                    <p class="text-4xl font-bold text-green-600">${{ number_format($producto->precio, 2) }}</p>
                </div>

                <!-- Cantidad -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500 p-6 rounded-lg">
                    <p class="text-gray-600 text-sm font-semibold mb-2">📦 CANTIDAD</p>
                    <p class="text-4xl font-bold text-blue-600">{{ $producto->cantidad }}</p>
                    <p class="text-gray-600 text-sm mt-2">
                        @if($producto->cantidad > 0)
                            <span class="text-green-600 font-semibold">✓ En Stock</span>
                        @else
                            <span class="text-red-600 font-semibold">✗ Sin Stock</span>
                        @endif
                    </p>
                </div>

                <!-- Valor Total -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-l-4 border-purple-500 p-6 rounded-lg">
                    <p class="text-gray-600 text-sm font-semibold mb-2">💵 VALOR TOTAL</p>
                    <p class="text-4xl font-bold text-purple-600">${{ number_format($producto->precio * $producto->cantidad, 2) }}</p>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-8 border-t-2 border-gray-200 pt-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-4">📝 Descripción</h3>
                @if($producto->descripcion)
                    <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-wrap bg-gray-50 p-6 rounded-lg border-l-4 border-slate-400">
                        {{ $producto->descripcion }}
                    </p>
                @else
                    <p class="text-gray-500 italic text-lg">No hay descripción disponible para este producto.</p>
                @endif
            </div>

            <!-- Acciones -->
            <div class="flex gap-4 flex-wrap pt-6 border-t-2 border-gray-200">
                <a href="{{ route('productos.edit', $producto->id) }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition font-semibold flex items-center gap-2">
                    ✏️ Editar Producto
                </a>

                <form action="{{ route('productos.destroy', $producto->id) }}"
                      method="POST"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')"
                            class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition font-semibold flex items-center gap-2">
                        🗑️ Eliminar Producto
                    </button>
                </form>

                <a href="{{ route('productos.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition font-semibold flex items-center gap-2">
                    📋 Ver Lista
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white text-center py-6 mt-12">
        <p class="mb-2">&copy; 2026 Sistema de Inventario - Todos los derechos reservados</p>
        <p class="text-sm text-gray-400">Desarrollado con Laravel y Tailwind CSS</p>
    </footer>

</body>
</html>
