<?php
namespace App\Services;
use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
                if ($account) {
                    return $account->user;
                } else {
                    $user = User::whereEmail($providerUser->getEmail())->first();
                    if (!$user) {
                                $user = User::create([
                                    'email' => $providerUser->getEmail(),
                                    'name' => $providerUser->getName(),
                                    'password' => md5(rand(1,10000)),
                                ]);
                                }
                                
                            $account = new SocialAccount([
                                'provider_user_id' => $providerUser->getId(),
                                'provider' => 'google'
                            ]);
                            $account->user()->associate($user);
                            $account->save();
                return $user;
                        }
    }
}