<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {

            //retrieves email from Google itself
            $user = Socialite::driver('google')->user();
            $email = $user->email;

            //checks if email exist in the database
            if($this->emailExists($email)){
                $userModel = User::where('email', $email)->first();

                //authenticates user login
                auth()->login($userModel);
                return redirect()->intended('dashboard');
            }else{
                return redirect(route('login'))->with("error", "Unregistered account");
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function emailExists($email)
    {
        // Check if the given email exists in the database
        return User::where('email', $email)->exists();
    }
}

