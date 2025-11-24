<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.auth')]
#[Title('Login')]
class Login extends Component
{
    public function mount()
    {
        if (Auth::guard('web')->check()) {
            session()->flash('error', 'You are logged in. Please logged out first');
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
