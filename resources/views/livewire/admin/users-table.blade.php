<x-form-section>
    <x-slot name="title">
        {{ __('Users') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage system users and roles') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">

            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="text-sm text-gray-600 uppercase text-center">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach($users as $user)
                        <tr class="border-t">
                            <td class="py-2">{{ $user->name }}</td>
                            <td class="py-2">{{ $user->email }}</td>
                            <td class="py-2 font-semibold">{{ $user->role }}</td>
                            <td class="py-2">
                                <x-secondary-button wire:click="selectUser({{ $user->id }})">
                                    Seleccionar
                                </x-secondary-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </x-slot>
</x-form-section>
