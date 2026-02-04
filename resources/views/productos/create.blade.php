<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Crear Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">
                    📦 Nuevo producto
                </h1>

                <form action="{{ route('productos.store') }}"
                      method="POST"
                      class="space-y-6">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <x-label for="nombre" value="Nombre" class="mb-1 text-base font-semibold text-gray-800" />
                        <x-input
                            id="nombre"
                            name="nombre"
                            type="text"
                            :value="old('nombre')"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                        />
                        <x-input-error for="nombre" class="mt-1 text-red-500" />
                    </div>

                    <!-- Descripción -->
                    <div>
                        <x-label for="descripcion" value="Descripción" class="mb-1 text-base font-semibold text-gray-800" />
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                        >{{ old('descripcion') }}</textarea>
                        <x-input-error for="descripcion" class="mt-1 text-red-500" />
                    </div>

                    <!-- Categoría -->
                    <div>
                        <x-label for="categoria_id" value="Categoría" class="mb-1 text-base font-semibold text-gray-800" />
                        <select
                            id="categoria_id"
                            name="categoria_id"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-white focus:border-blue-500 focus:ring focus:ring-blue-200"
                        >
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="categoria_id" class="mt-1 text-red-500" />
                        @if ($categorias->isEmpty())
                            <p class="mt-2 text-sm text-amber-600">
                                Aún no hay categorías. Crea una desde el módulo de categorías.
                            </p>
                        @endif
                    </div>

                    <!-- Precio -->
                    <div>
                        <x-label for="precio" value="Precio ($)" class="mb-1 text-base font-semibold text-gray-800" />
                        <x-input
                            id="precio"
                            name="precio"
                            type="number"
                            step="0.01"
                            :value="old('precio')"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                        />
                        <x-input-error for="precio" class="mt-1 text-red-500" />
                    </div>

                    <!-- Cantidad -->
                    <div>
                        <x-label for="cantidad" value="Cantidad" class="mb-1 text-base font-semibold text-gray-800" />
                        <x-input
                            id="cantidad"
                            name="cantidad"
                            type="number"
                            :value="old('cantidad')"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                        />
                        <x-input-error for="cantidad" class="mt-1 text-red-500" />
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 pt-6">
                        <x-button class="flex-1 justify-center rounded-lg bg-green-600 py-3 text-base font-semibold normal-case tracking-normal hover:bg-green-700 focus:ring-green-500">
                            ✅ Guardar
                        </x-button>

                        <a href="{{ route('productos.index') }}"
                           class="flex-1 rounded-lg bg-gray-500 py-3 text-center text-base font-semibold text-white transition hover:bg-gray-600">
                            ❌ Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
