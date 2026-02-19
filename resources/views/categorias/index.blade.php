<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🗂️ Categorías
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                            Lista de categorías
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">
                            Organiza tus productos por categoría.
                        </p>
                    </div>

                    <a href="{{ route('categorias.create') }}"
                       class="inline-flex w-full sm:w-auto items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-white font-semibold transition hover:bg-blue-700">
                        ➕ Nueva categoría
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="md:hidden space-y-4">
                    @forelse($categorias as $categoria)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-800 break-words">
                                        {{ $categoria->nombre }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 break-words">
                                        {{ $categoria->descripcion ?: '—' }}
                                    </p>
                                </div>

                                <div class="flex flex-col gap-2 shrink-0">
                                    <a href="{{ route('categorias.edit', $categoria) }}"
                                       class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition text-center">
                                        Editar
                                    </a>

                                    <form action="{{ route('categorias.destroy', $categoria) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button
                                            type="submit"
                                            class="w-full justify-center px-3 py-1 text-sm rounded-md bg-red-100 text-red-700 normal-case tracking-normal hover:bg-red-200"
                                        >
                                            Eliminar
                                        </x-danger-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-lg border border-gray-200 bg-white p-6 text-center text-gray-500">
                            No hay categorías registradas.
                        </div>
                    @endforelse
                </div>

                <div class="hidden md:block overflow-x-auto">
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
