<?php

namespace App\Livewire\Admin;

use Livewire\Component;

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ChangeUserRole extends Component
{
    public $users;
    public $userId;
    public $role;

    public function mount()
    {
        abort_unless(auth()->user()->role === 'admin', 403);
        $this->users = User::where('role', '!=', 'admin')->get();
    }

    public function changeUserRole()
    {
        $this->validate([
            'userId' => 'required|exists:users,id',
            'role'   => 'required|in:admin,employee',
        ]);

        User::findOrFail($this->userId)->update([
            'role' => $this->role,
        ]);

        $this->dispatch('roleChanged');
    }

    public function render()
    {
        return view('livewire.admin.change-user-role');
    }

    protected $listeners = ['userSelected'];

public function userSelected($userId)
{
    $this->selectedUser = User::findOrFail($userId);
}

}

