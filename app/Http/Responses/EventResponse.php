<?php

namespace App\Http\Responses;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventResponse
{
    public static function mapAllEvents(Collection $events): array
    {
        return $events->map(fn ($event) => self::mapSingleEvent($event))->all();
    }

    public static function mapSingleEvent(Event $event): array
    {
        return [
            "id" => $event->id,
            "eventTitle" => $event->event_title,
            "eventVenue" => $event->event_venue,
            "eventDate" => $event->event_date,
            "eventVenueCapacity" => $event->event_venue_capacity,
            "eventDescription" => $event->event_descrition,
            "eventOrganizer" => $event->event_organizer,
            "eventCharges" => $event->event_charges,
            "eventImageUrl" => $event->event_image_url,
            "eventVenueImageUrl" => $event->event_venue_image_url,
        ];
    }
}
