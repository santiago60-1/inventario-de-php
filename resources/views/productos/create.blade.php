<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
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
    <main class="max-w-3xl mx-auto px-4 py-8 flex-1">
        <h1 class="text-3xl font-bold mb-8 border-b-4 border-red-500 pb-4">
            ➕ Crear un nuevo producto
        </h1>

        <!-- FORM -->
        <form action="{{ route('productos.store') }}"
              method="POST"
              class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @csrf

            <!-- NOMBRE -->
            <div>
                <label for="nombre" class="block font-semibold mb-2 text-slate-800">
                    Nombre del producto
                </label>
                <input type="text"
                       id="nombre"
                       name="nombre"
                       placeholder="Ingresa el nombre del producto"
                       required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent">
            </div>

            <!-- DESCRIPCIÓN -->
            <div>
                <label for="descripcion" class="block font-semibold mb-2 text-slate-800">
                    Descripción
                </label>
                <textarea id="descripcion"
                          name="descripcion"
                          rows="4"
                          placeholder="Describe el producto"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent"></textarea>
            </div>

            <!-- PRECIO -->
            <div>
                <label for="precio" class="block font-semibold mb-2 text-slate-800">
                    Precio ($)
                </label>
                <input type="number"
                       id="precio"
                       name="precio"
                       step="0.01"
                       placeholder="0.00"
                       required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent">
            </div>

            <!-- CANTIDAD -->
            <div>
                <label for="cantidad" class="block font-semibold mb-2 text-slate-800">
                    Cantidad
                </label>
                <input type="number"
                       id="cantidad"
                       name="cantidad"
                       min="0"
                       placeholder="0"
                       required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent">
            </div>

            <!-- BOTONES -->
            <div class="flex gap-4 pt-6">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold flex-1">
                    ✅ Crear Producto
                </button>

                <a href="{{ route('productos.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition font-semibold flex-1 text-center">
                    ❌ Cancelar
                </a>
            </div>
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white text-center py-6 mt-12">
        <p class="mb-2">&copy; 2026 Sistema de Inventario - Todos los derechos reservados</p>
        <p class="text-sm text-gray-400">Desarrollado con Laravel y Tailwind CSS</p>
    </footer>
