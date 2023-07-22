<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialProviderController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        return redirect(
            $social->loginAndGetRedirectUrl(Socialite::driver($driver)->user())
        );
    }
}
