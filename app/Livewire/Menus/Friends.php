<?php

namespace App\Livewire\Menus;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Friends extends Component
{
    public function render()
    {
        $user = Auth::guard('web')->user();
        $follower = $user->followers()->with('followers','following')->get();
        $following = $user->following()->with('following')->get();
        // dd($follower);
        return view('livewire.menus.friends',[
            'followers' => $follower,
            'following' => $following,
        ]);
    }
}
