<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.auth')]
#[Title('Register')]
class Register extends Component
{
    use WithFileUploads;
    public $name, $username, $email, $password, $password_confirmation, $profile_picture;

    public function registerUser()
    {
        $validation = $this->validate([
            'name' => 'required|min:3|max:50', // FIXED
            'username' => 'required|min:3|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {

            // Handle profile picture
            if ($this->profile_picture) {
                $validation['profile_picture'] = $this->profile_picture->store('users', 'public');
            }

            $validation['password'] = Hash::make($validation['password']);

            // remove password_confirmation
            unset($validation['password_confirmation']);

            User::create($validation);
            DB::commit();
            $this->login();

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            session()->flash('error', $e->getMessage());
        }
    }

    public function login()
    {
        // Login
        $authAttempt = Auth::attempt([
            'username' => $this->username,
            'password' => $this->password,
        ]);

        return $authAttempt
            ? redirect()->route('home')
            : redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
