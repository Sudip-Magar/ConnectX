<?php

namespace App\Livewire\Menus;

use Livewire\Component;
use App\Models\User as modelUser;

class User extends Component
{
    public $user;
    public function mount($username)
    {
        $this->user = modelUser::with('posts', 'following', 'followers', 'likes', 'comments')->where('username', $username)->firstOrFail();
        // dd($user);
    }
    public function render()
    {
        return view('livewire.menus.user',[
            'user' => $this->user,
        ]);
    }
}
