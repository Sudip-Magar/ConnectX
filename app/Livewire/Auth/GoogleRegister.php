<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class GoogleRegister extends Component
{
    public $google_id, $email, $name;

    // For new users
    public $username;
    public $password;
    public $password_confirmation;

    public $isNewUser = false;

    public function mount()
    {
        if(Auth::guard('web')->check()){
            session()->flash('error', 'You are logged in. Please logged out first');
            return redirect()->route('home');
        }
        $google = Socialite::driver('google')->stateless()->user();

        $this->google_id = $google->id;
        $this->email = $google->email;
        $this->name = $google->name;

        // Check if user exists
        $existing = User::where('google_id', $google->id)->first();

        if ($existing) {
            // Auto login
            Auth::login($existing);
            return redirect()->route('home');
        }

        if(User::where('email', $this->email)->exists()){
            session()->flash('error','This email already exists. Please log in.');
            return redirect()->route('login');
        }

        // New google user → show form
        $this->isNewUser = true;
    }


    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:3|max:20|unique:users,username',
            'password' => 'required|min:6|confirmed',
        ], [
            'username.required' => 'Username is required.',
            'username.min' => 'Username must be at least 3 characters.',
            'username.max' => 'Username cannot be more than 20 characters.',
            'username.unique' => 'This username is already taken. Please try another one.',

            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'google_id' => $this->google_id,
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.google-register');
    }
}
