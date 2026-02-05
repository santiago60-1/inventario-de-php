<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr class="text-center text-gray-700 uppercase text-sm">
                <th class="py-3 px-4">Fotos</th>
                <th class="py-3 px-4">Nombre</th>
                <th class="py-3 px-4">Descripción</th>
                <th class="py-3 px-4">Categoría</th>
                <th class="py-3 px-4">Precio</th>
                <th class="py-3 px-4">Cantidad</th>

                @if(auth()->user()->role === 'admin')
                    <th class="py-3 px-4">Creado por</th>
                @endif

                <th class="py-3 px-4">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-center text-gray-700">
        @forelse($productos as $producto)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="py-3 px-4">
                    @php($fotos = $producto->fotos ?? [])
                    @if(count($fotos) > 0)
                        <div class="flex items-center justify-center gap-2">
                            <img
                                src="{{ asset('storage/' . $fotos[0]) }}"
                                alt="Foto de {{ $producto->nombre }}"
                                class="size-12 rounded-lg object-cover border border-gray-200"
                            />
                            @if(count($fotos) > 1)
                                <span class="text-xs text-gray-500">+{{ count($fotos) - 1 }}</span>
                            @endif
                        </div>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </td>
                <td class="py-3 px-4 font-medium">{{ $producto->nombre }}</td>
                <td class="py-3 px-4">{{ $producto->descripcion ?: '—' }}</td>
                <td class="py-3 px-4">
                    {{ $producto->categoria?->nombre ?? 'Sin categoría' }}
                </td>
                <td class="py-3 px-4">${{ number_format($producto->precio, 2) }}</td>
                <td class="py-3 px-4">{{ $producto->cantidad }}</td>

                @if(auth()->user()->role === 'admin')
                    <td class="py-3 px-4 text-gray-500">
                        {{ $producto->user->name ?? '—' }}
                    </td>
                @endif

                <td class="py-3 px-4">
                    <div class="flex justify-center gap-2">

                        @can('view', $producto)
                            <a href="{{ route('productos.show', $producto->id) }}"
                               class="px-3 py-1 text-sm rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                Ver
                            </a>
                        @endcan

                        @can('update', $producto)
                            <a href="{{ route('productos.edit', $producto->id) }}"
                               class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                                Editar
                            </a>
                        @endcan

                        @can('delete', $producto)
                            <form action="{{ route('productos.destroy', $producto->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <x-danger-button
                                    type="submit"
                                    class="px-3 py-1 text-sm rounded-md bg-red-100 text-red-700 normal-case tracking-normal hover:bg-red-200">
                                    Eliminar
                                </x-danger-button>
                            </form>
                        @endcan

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ auth()->user()->role === 'admin' ? 8 : 7 }}" class="py-6 text-gray-500 text-center">
                    No hay productos registrados.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($productos->hasPages())
        <div class="mt-6">
            {{ $productos->links() }}
        </div>
    @endif
</div>
