<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📦 {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6">

                <!-- HEADER -->
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                        Lista de Productos
                    </h1>

                    @can('create', App\Models\Producto::class)
                        <a href="{{ route('productos.create') }}"
                           class="inline-flex w-full sm:w-auto items-center justify-center bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            ➕ Crear producto
                        </a>
                    @endcan
                </div>

                {{-- 👇 AQUÍ VA EL COMPONENTE --}}
                <livewire:productos.productos-table />

            </div>
        </div>
    </div>
</x-app-layout>
