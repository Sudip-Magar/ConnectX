<?php

namespace App\Livewire\Menus;

use App\Models\Follow;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class People extends Component
{
    public $userId;
    public function following($id)
    {
        DB::beginTransaction();
        try {
            $follow = Follow::create([
                'follower_id' => $this->userId,
                'following_id' => $id,
            ]);

            Notification::create([
                'user_id' => $id,
                'by' => $this->userId,
                'type' => 'follow',
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

    public function render()
    {
        $this->userId = Auth::guard('web')->user()->id;
        $authUser = User::find($this->userId);

        $people = User::where('id', '!=', $this->userId)->latest()->get();

        $people = $people->map(function ($user) use ($authUser) {

            $isFollow = $authUser->following->contains($user->id);
            $theyFollowMe = $authUser->followers->contains($user->id);

            if ($isFollow && $theyFollowMe) {
                $user->follow_status = 'Connected';
            } elseif ($isFollow) {
                $user->follow_status = 'Following';
            } elseif ($theyFollowMe) {
                $user->follow_status = 'Follow Back';
            } else {
                $user->follow_status = 'Connect';
            }

            return $user;
        });

        // ✅ Show only NOT connected users
        $people = $people->filter(fn($user) => $user->follow_status !== 'Connected');

        return view('livewire.menus.people', [
            'users' => $people,
        ]);
    }
}
