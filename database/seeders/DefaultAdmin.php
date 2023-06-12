<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "full_name" => "Atop Projects",
            "country" => "Nigeria",
            "city" => "Lagos",
            "email" => "atopproject@gmail.com",
            "password" => "12345678",
            "role" => "ROLE_ADMIN"
        ]);
    }
}
