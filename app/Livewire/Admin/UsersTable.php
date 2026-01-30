<?php

namespace App\Livewire\Admin;

use Livewire\Component;

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UsersTable extends Component
{
    public $users;

    public function mount()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $this->users = User::where('role', '!=', 'admin')->get();
    }

    public function selectUser($id)
    {
        $this->dispatch('userSelected', userId: $id);
    }

    public function render()
    {
        return view('livewire.admin.users-table');
    }
}

