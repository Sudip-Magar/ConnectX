<?php

namespace App\Livewire\Menus;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Notification as modelNotification;



class Notification extends Component
{
    public $limit = null;

    public function mount($limit = null)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $user = Auth::guard('web')->user();
        $query = modelNotification::where('user_id', $user->id)->latest();
        if ($this->limit) {
            $query->limit($this->limit);
        }

        return view('livewire.menus.notification', [
            'notifications' => $query->get(),
        ]);
    }
}
