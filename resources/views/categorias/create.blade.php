<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Crear Categoría
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">
                    🗂️ Nueva categoría
                </h1>

                <form action="{{ route('categorias.store') }}"
                      method="POST"
                      class="space-y-6">
                    @csrf

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

                    <div class="flex gap-4 pt-6">
                        <x-button class="flex-1 justify-center rounded-lg bg-green-600 py-3 text-base font-semibold normal-case tracking-normal hover:bg-green-700 focus:ring-green-500">
                            ✅ Guardar
                        </x-button>

                        <a href="{{ route('categorias.index') }}"
                           class="flex-1 rounded-lg bg-gray-500 py-3 text-center text-base font-semibold text-white transition hover:bg-gray-600">
                            ❌ Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
