<?php

namespace App\Http\Traits;

trait UserTrait
{
    public function registerBasicUserDetails(array $userDetails)
    {
        return User::create([
            'full_name' => $userDetails['fullName'],
            'country' => $userDetails['country'],
            'city' => $userDetails['city'],
            'email' => $userDetails['email'],
            'password' => Hash::make($userDetails['password']),
            'role' => $userDetails['role'],
        ]);
    }

    public function deleteBasicUserDetails(int $userId): void
    {
        $user = User::findorfail($userId);
        $user->delete();
    }
}
