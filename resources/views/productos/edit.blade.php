<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Editar Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">
                    📦 Editar información del producto
                </h1>

                <form action="{{ route('productos.update', $producto->id) }}"
                      method="POST"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div>
                        <label class="block font-semibold mb-1">
                            Nombre
                        </label>
                        <input type="text"
                               name="nombre"
                               value="{{ old('nombre', $producto->nombre) }}"
                               class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                               required>
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block font-semibold mb-1">
                            Descripción
                        </label>
                        <textarea name="descripcion"
                                  rows="4"
                                  class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label class="block font-semibold mb-1">
                            Precio ($)
                        </label>
                        <input type="number"
                               step="0.01"
                               name="precio"
                               value="{{ old('precio', $producto->precio) }}"
                               class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                               required>
                        @error('precio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cantidad -->
                    <div>
                        <label class="block font-semibold mb-1">
                            Cantidad
                        </label>
                        <input type="number"
                               name="cantidad"
                               value="{{ old('cantidad', $producto->cantidad) }}"
                               class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                               required>
                        @error('cantidad')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 pt-6">
                        <button type="submit"
                                class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            💾 Guardar cambios
                        </button>

                        <a href="{{ route('productos.index') }}"
                           class="flex-1 bg-gray-500 text-white py-3 rounded-lg font-semibold hover:bg-gray-600 transition text-center">
                            ❌ Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
