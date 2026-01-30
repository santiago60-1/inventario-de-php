<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📦 {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">
                        Lista de Productos
                    </h1>

                    @can('create', App\Models\Producto::class)
                        <a href="{{ route('productos.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
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
