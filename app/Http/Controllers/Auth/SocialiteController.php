<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->back();
        }

        //find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        // login user
        Auth()->login($authUser, true);

        // after login redirect to dashboard
        return redirect()->rout('dashboard');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // get social account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())->where('provider_name', $provider)
            ->first();

        // jika sudah ada
        if ($socialAccount) {
            return $socialAccount->user;

            // jika belum
        } else {
            // user berdasarkan email
            $user  = User::where('email', $socialUser->getEmail())->first();

            // jika tidak ada user
            if (!$user) {
                // create new user
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail()
                ]);
            }

            // buat social account baru
            $user->socialAccounts()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider
            ]);

            return $user;
        }
    }
}
