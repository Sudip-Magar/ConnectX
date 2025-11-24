<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googelAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect()->route('home');
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('password@123'),
                    'google_id' => $googleUser->id
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect()->route('home');
                }
            }
            // dd($googleUser);
        }
        catch(Exception $e){
            dd($e);
        }
    }
}
