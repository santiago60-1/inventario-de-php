<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🗂️ Categorías
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">
                            Lista de categorías
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">
                            Organiza tus productos por categoría.
                        </p>
                    </div>

                    <a href="{{ route('categorias.create') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-white font-semibold transition hover:bg-blue-700">
                        ➕ Nueva categoría
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr class="text-center text-gray-700 uppercase text-sm">
                                <th class="py-3 px-4">Nombre</th>
                                <th class="py-3 px-4">Descripción</th>
                                <th class="py-3 px-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="text-center text-gray-700">
                        @forelse($categorias as $categoria)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="py-3 px-4 font-medium">{{ $categoria->nombre }}</td>
                                <td class="py-3 px-4">{{ $categoria->descripcion ?: '—' }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('categorias.edit', $categoria) }}"
                                           class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                                            Editar
                                        </a>

                                        <form action="{{ route('categorias.destroy', $categoria) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button
                                                type="submit"
                                                class="px-3 py-1 text-sm rounded-md bg-red-100 text-red-700 normal-case tracking-normal hover:bg-red-200"
                                            >
                                                Eliminar
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-gray-500 text-center">
                                    No hay categorías registradas.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categorias->hasPages())
                    <div class="mt-6">
                        {{ $categorias->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
