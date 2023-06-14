<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{
    public function registerBasicUserDetails(array $userDetails)
    {
        $user = User::where("email", "=", $userDetails['email'])->first();

        if (!is_null($user)) {
            return $user;
        }

        return User::create([
            'full_name' => $userDetails['fullName'],
            'country' => $userDetails['country'],
            'city' => $userDetails['city'],
            'email' => $userDetails['email'],
            'phone_number' => $userDetails['phoneNumber'],
            'password' => Hash::make($userDetails['password']),
            'role' => $userDetails['role'],
        ]);
    }

    public function deleteBasicUserDetails(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->delete();
    }
}
