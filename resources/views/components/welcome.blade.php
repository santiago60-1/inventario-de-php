

    {{-- ================= ADMIN ================= --}}
    @if(auth()->user()->role === 'admin')
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1 class="text-3xl font-bold text-gray-900">
                🛠 Panel de Administración
            </h1>

            <p class="mt-4 text-gray-600">
                Gestiona productos, usuarios y configuraciones del sistema.
            </p>
        </div>

        <div class="bg-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6 p-6 lg:p-8">

            {{-- Productos --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">📦 Productos</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Crear, editar y eliminar productos.
                </p>

                <a href="{{ route('productos.index') }}"
                   class="mt-4 inline-block text-indigo-600 font-semibold">
                    Gestionar productos →
                </a>
            </div>

            {{-- Usuarios --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">👥 Usuarios</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Controla roles y permisos.
                </p>

                <a href="{{ route('profile.show') }}"
                   class="mt-4 inline-block text-indigo-600 font-semibold">
                    Administrar usuarios →
                </a>
            </div>

            {{-- Categorías --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">🗂️ Categorías</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Organiza los productos por categoría.
                </p>

                <a href="{{ route('categorias.index') }}"
                   class="mt-4 inline-block text-indigo-600 font-semibold">
                    Gestionar categorías →
                </a>
            </div>
        </div>
    @endif

    {{-- ================= EMPLEADO ================= --}}
    @if(auth()->user()->role === 'empleado')
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1 class="text-3xl font-bold text-gray-900">
                🧑‍💼 Panel de Empleado
            </h1>

            <p class="mt-4 text-gray-600">
                Accede a tus productos y tareas asignadas.
            </p>
        </div>

        <div class="bg-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6 p-6 lg:p-8">

            {{-- Mis productos --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">📦 Mis productos</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Consulta y actualiza productos asignados.
                </p>

                <a href="{{ route('productos.index') }}"
                   class="mt-4 inline-block text-indigo-600 font-semibold">
                    Ver productos →
                </a>
            </div>

            {{-- Perfil --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">👤 Mi perfil</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Actualiza tu información personal.
                </p>

                <a href="{{ route('trigger') }}"
                   class="mt-4 inline-block text-indigo-600 font-semibold">
                    Editar perfil →
                </a>
            </div>

        </div>
    @endif
