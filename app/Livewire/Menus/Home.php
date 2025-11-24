<?php

namespace App\Livewire\Menus;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $user;
    public function mount(){
        if (!Auth::guard('web')->check()) {
            session()->flash('error', 'Please create an acocunt or login if you already created an account');
            return redirect()->route('login');
        }
        $this->user = Auth::guard('web')->user();
    }
    public function render()
    {
        return view('livewire.menus.home');
    }
}
