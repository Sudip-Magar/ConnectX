<?php

namespace App\Livewire\Menus;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $user;
    public function mount(){
        $this->user = Auth::guard('web')->user();
    }

    public function logout(){
        Auth::logout();
        session()->flash('success', 'Logout successfull. See you later!!');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.menus.header');
    }
}
