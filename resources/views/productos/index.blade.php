<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

    <!-- HEADER -->
    <header class="font-semibold text-xl text-gray-800 leading-tight">
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
    <main class="max-w-7xl mx-auto px-4 py-8 flex-1">
        <h1 class="text-3xl font-bold mb-6 border-b-4 border-red-500 pb-4">Lista de Productos</h1>

        <!-- BOTÓN AGREGAR -->
        <div class="mb-6">
            <a href="{{ route('productos.create') }}"
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 transition font-medium">
                ➕ Agregar Producto
            </a>
        </div>

        <!-- TABLA -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-slate-800">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-slate-800">Nombre</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-slate-800">Descripción</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-slate-800">Precio</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-slate-800">Cantidad</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-slate-800">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($productos as $producto)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-medium">{{ $producto->id }}</td>
                            <td class="px-4 py-3 font-medium">{{ $producto->nombre }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ Str::limit($producto->descripcion, 50) }}
                            </td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                ${{ number_format($producto->precio, 2) }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-block bg-slate-100 px-3 py-1 rounded font-medium text-slate-800">{{ $producto->cantidad }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2 flex-wrap">
                                    <a href="{{ route('productos.show', $producto->id) }}"
                                       class="bg-purple-500 text-white px-3 py-2 rounded-md hover:bg-purple-600 transition font-medium text-sm">
                                        👁️ Ver
                                    </a>

                                    <a href="{{ route('productos.edit', $producto->id) }}"
                                       class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition font-medium text-sm">
                                        ✏️ Editar
                                    </a>

                                    <form action="{{ route('productos.destroy', $producto->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')"
                                                class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition font-medium text-sm">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="text-center py-12 text-gray-500">
                                <p class="text-lg mb-4">No hay productos disponibles.</p>
                                <a href="{{ route('productos.create') }}"
                                   class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium">
                                    ➕ Crear uno
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if($paginator->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $paginator->links('pagination::tailwind') }}
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white text-center py-6 mt-12">
        <p class="mb-2">&copy; 2026 Sistema de Inventario - Todos los derechos reservados</p>
        <p class="text-sm text-gray-400">Desarrollado con Laravel y Tailwind CSS</p>
    </footer>
