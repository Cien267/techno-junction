<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginFacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Facebook login failed');
        }

        // $user now contains the user details returned by Facebook
        // You can handle user registration/login logic here

        return redirect('/home'); // Redirect to the home page or wherever you want
    }
}
