<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Actions\Fortify\UpdateUserProfileInformation;

class UpdateProfileInformationForm extends Component
{
    public $state = [];

    public function mount()
    {
        $user = Auth::user();
        $this->state = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => $user->country,
            'province' => $user->province,
            'district' => $user->district,
            'sector' => $user->sector,
            'cell' => $user->cell,
            'village' => $user->village,
        ];
    }

    public function updateProfileInformation()
    {
        $user = Auth::user();
        $validated = $this->validate([
            'state.name' => ['required', 'string', 'max:255'],
            'state.email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'state.phone' => ['nullable', 'string', 'max:20'],
            'state.country' => ['nullable', 'string', 'max:255'],
            'state.province' => ['nullable', 'string', 'max:255'],
            'state.district' => ['nullable', 'string', 'max:255'],
            'state.sector' => ['nullable', 'string', 'max:255'],
            'state.cell' => ['nullable', 'string', 'max:255'],
            'state.village' => ['nullable', 'string', 'max:255'],
        ]);

        dd($this->state);

        $user->update([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'phone' => $this->state['phone'],
            'country' => $this->state['country'],
            'province' => $this->state['province'],
            'district' => $this->state['district'],
            'sector' => $this->state['sector'],
            'cell' => $this->state['cell'],
            'village' => $this->state['village'],
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('profile.update-profile-information-form');
    }
}
