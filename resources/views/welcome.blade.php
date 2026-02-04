<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Inventario</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gradient-to-r from-slate-800 to-slate-900 text-white py-6 px-6 shadow-lg">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-bold">📦 Sistema de Inventario</h1>
        </div>
    </header>


    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 flex-1">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-4xl font-bold text-gray-800 border-b-4 border-red-500 pb-4 mb-4">Bienvenido al Sistema de Inventario</h2>
            <p class="text-lg text-gray-600 mb-8">Gestiona tus productos de forma eficiente y organizada con nuestro sistema moderno y fácil de usar.</p>

            <div class="grid md:grid-cols-2 gap-4">
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-4 text-center text-lg font-semibold text-white shadow-md transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                >
                    Iniciar sesion
                </a>
                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-6 py-4 text-center text-lg font-semibold text-white shadow-md transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-300"
                >
                    Registrarse
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">✨ Funcionalidades Principales</h3>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500 p-6 rounded-lg hover:shadow-md transition-shadow">
                    <p class="text-2xl mb-2">📋</p>
                    <h4 class="font-bold text-gray-800 mb-2">Visualizar Productos</h4>
                    <p class="text-gray-600">Consulta todos los productos registrados en tu inventario en una tabla clara y organizada.</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500 p-6 rounded-lg hover:shadow-md transition-shadow">
                    <p class="text-2xl mb-2">➕</p>
                    <h4 class="font-bold text-gray-800 mb-2">Crear Productos</h4>
                    <p class="text-gray-600">Agrega nuevos productos con nombre, descripción, precio y cantidad de stock.</p>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg hover:shadow-md transition-shadow">
                    <p class="text-2xl mb-2">✏️</p>
                    <h4 class="font-bold text-gray-800 mb-2">Editar Productos</h4>
                    <p class="text-gray-600">Modifica la información de tus productos existentes en cualquier momento.</p>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-red-100 border-l-4 border-red-500 p-6 rounded-lg hover:shadow-md transition-shadow">
                    <p class="text-2xl mb-2">🗑️</p>
                    <h4 class="font-bold text-gray-800 mb-2">Eliminar Productos</h4>
                    <p class="text-gray-600">Elimina productos del inventario cuando ya no sean necesarios.</p>
                </div>
            </div>
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
