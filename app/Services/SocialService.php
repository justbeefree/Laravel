<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null){
            return route('auth.register');
        }

        if ($socialUser->getName()){
            $user->name = $socialUser->getName();
        }
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()){
            Auth::loginUsingId($user->id);

            return route('personal');
        }

        throw new \Exception('did not sav user');
    }
}
