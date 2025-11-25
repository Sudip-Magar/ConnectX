<?php

namespace App\Livewire\Menus;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Notification as modelNotification;



class Notification extends Component
{
    
    public function render()
    {
        $user= Auth::guard('web')->user();
        return view('livewire.menus.notification', [
            'notifications' => modelNotification::where('user_id',$user->id)->latest()->limit(10)->get(),
        ]);
    }
}
