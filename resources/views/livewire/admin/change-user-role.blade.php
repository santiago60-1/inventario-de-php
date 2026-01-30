<x-form-section submit="changeUserRole">
    <x-slot name="title">
        {{ __('User Role Management') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Assign or change the role of a user. Only administrators can perform this action.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Select User -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user_id" value="{{ __('Select Employee') }}" />
            <select
                id="user_id"
                wire:model="userId"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">-- Select a user --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            <x-input-error for="userId" class="mt-2" />
        </div>

        <!-- Select Role -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="role" value="{{ __('Select Role') }}" />
            <select
                id="role"
                wire:model="role"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">-- Select a role --</option>
                <option value="admin">Administrator</option>
                <option value="employee">Employee</option>
            </select>
            <x-input-error for="role" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="roleChanged">
            {{ __('Role updated successfully.') }}
        </x-action-message>

        <x-button>
            {{ __('Change Role') }}
        </x-button>
    </x-slot>
</x-form-section>
