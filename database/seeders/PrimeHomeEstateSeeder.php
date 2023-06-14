<?php

namespace Database\Seeders;

use App\Models\PrimeHomeEstate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrimeHomeEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrimeHomeEstate::create([
            "estate_image" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686766098/shbcfvyasf4e5plnf43y.jpg",
            "estate_title" => "Prime Home Estate",
            "estate_description" => "Prime Home Estate A",
            "estate_price" => "1000000",
        ]);
        PrimeHomeEstate::create([
            "estate_image" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686766988/fecrdhspa6eqy5rrnwbi.jpg",
            "estate_title" => "Prime Home Estate",
            "estate_description" => "Prime Home Estate B",
            "estate_price" => "1000000",
        ]);
        PrimeHomeEstate::create([
            "estate_image" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686767021/w1ediyzgdysmhufjrxwn.jpg",
            "estate_title" => "Prime Home Estate",
            "estate_description" => "Prime Home Estate C",
            "estate_price" => "1000000",
        ]);
    }
}
