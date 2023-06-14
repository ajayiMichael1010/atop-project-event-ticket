<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            "event_title" => "Nollywood Film Festival Germany & Nega Awards Gala Nite",
            "event_description" =>"The Nollywood Film Festival Germany & Nega Awards Gala Nite is a prestigious event that celebrates the vibrant Nigerian film industry, commonly known as Nollywood. Held annually in Germany, the festival showcases the best of Nigerian cinema, including feature films, documentaries, and short films. It serves as a platform to promote Nigerian culture, talent, and creativity to a global audience.",
            "event_venue" => "Burgerzentrum-Ulrich-Strabe 9, 64331 Weiterstadt HBF Training -Station",
            "event_date" => "2023-07-29",
            "event_organizer" => "Ehizoya Golden Entertainment (EGE)",
            "event_charges" => "30",
            "event_type" => "Entertainment",
            "event_venue_capacity" => "120000",
            "event_image_url" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562314/xrf1iijveb6ncdfucyi5.jpg",
            "event_venue_image_url" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562320/unhmsxy1mrgf6qhg1hcu.jpg",
        ]);
        Event::create([
            "event_title" => "Raffle Drawn,  of 2bedroom flat at Prime Home Estate.",
            "event_description" =>"Win big when you participate in the raffle draw",
            "event_venue" => "Burgerzentrum-Ulrich-Strabe 9, 64331 Weiterstadt HBF Training -Station",
            "event_date" => "2023-06-29",
            "event_organizer" => "Ehizoya Golden Entertainment (EGE)",
            "event_charges" => "30",
            "event_type" => "Contest",
            "event_venue_capacity" => "100000",
            "event_image_url" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562753/lro0kpmkohyusxxpm4zu.jpg",
            "event_venue_image_url" => "https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562764/sz9t8g6sylbcawaq7gjr.jpg",
        ]);
    }
}

