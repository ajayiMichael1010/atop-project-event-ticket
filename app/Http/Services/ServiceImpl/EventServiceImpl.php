<?php

namespace App\Http\Services\ServiceImpl;

use App\Http\Services\EventService;
use App\Http\Enums\UserRole;
use App\Http\Requests\EventRequest;
use App\Http\Requests\TicketOrderRequest;
use App\Http\Responses\EventResponse;
use App\Http\Responses\TicketOrderResponse;
use App\Http\Services\MediaManagerService;
use App\Models\Event;
use App\Models\TicketOrder;
use Illuminate\Support\Str;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;

class EventServiceImpl implements EventService
{
    private  MediaManagerService $mediaManagerService;

    /**
     * @param MediaManagerService $mediaManagerService
     */
    public function __construct(MediaManagerService $mediaManagerService)
    {
        $this->mediaManagerService = $mediaManagerService;
    }


    use UserTrait;
    public function createEVent(EventRequest $request): void
    {
        $event = new Event;
        $this->setUpEventDetails($request, $event);
    }


    public function updateEvent(EventRequest $request, int $eventId): void
    {
      $event = Event::findorfail($eventId);
        $this->setUpEventDetails($request, $event);
    }

    public function getAllEvents(): array
    {
        $events = Event::all();
        return EventResponse::mapAllEvents($events);
    }

    public function getEventById(int $eventId): array
    {
        $event = Event::findOrFail($eventId);
        return EventResponse::mapSingleEvent($event);
    }

    public function deleteEventById(int $eventId): void
    {
        $event = Event::findOrFail($eventId);
        $event->delete($eventId);
    }

    public function deleteTicketById(int $ticketId)
    {
        $ticket = TicketOrder::findOrFail($ticketId);
        $ticket->delete();
    }

    /**
     * @param EventRequest $request
     * @param $event
     * @return void
     */
    private function setUpEventDetails(EventRequest $request, $event): void
    {
        $eventImageUrl =  $this->mediaManagerService->uploadMedia($request->file("eventImage"));
        $eventVenueImageUrl =  $this->mediaManagerService->uploadMedia($request->file("eventVenueImage"));

        $event->event_title = $request->eventTitle;
        $event->event_description = $request->eventDescription;
        $event->event_venue = $request->eventVenue;
        $event->event_date = $request->eventDate;
        $event->event_organizer = $request->eventOrganizer;
        $event->event_charges = $request->eventCharges;
        $event->event_type = $request->eventType;
        $event->event_venue_capacity = $request->eventVenueCapacity;

        $event->event_image_url = $eventImageUrl;
        $event->event_venue_image_url = $eventVenueImageUrl;

        $event->save();
    }

    public function buyEventTicket(TicketOrderRequest $request): void
    {
        $user = $this->registerBasicUserDetails([
            'full_name' => $request->fullName,
            'country' => $request->country,
            'city' => $request->city,
            'email' =>$request->email,
            'password' =>"evenT@2023",
            'role' => UserRole::ROLE_USER,
        ]);


        $eventTicketOrder = new TicketOrder;
        $eventTicketOrder->ticket_order_ref = Str::uuid()->toString();
        $eventTicketOrder->charges_per_event = $request->chargesPerEvent;
        $eventTicketOrder->total_tickets = $request->totalTickets;
        $eventTicketOrder->ticket_option = $request->ticketOption;
        $eventTicketOrder->event_id = $request->eventId;
        $eventTicketOrder->user_id = $user->id;

        $eventTicketOrder->save();

    }

    public function getAllOrderedTickets(): array
    {
        $eventTicketOrder = TicketOrder::with('getEvent','getUser')->get();
        return TicketOrderResponse::mapAllTicketOrders($eventTicketOrder);
    }

    public function getOrderedTicketById($id): array
    {
        $eventTicketOrder = TicketOrder::with('getEvent','getUser')->findOrFail($id);
        return TicketOrderResponse::mapSingleTicketOrder($eventTicketOrder);
    }

    public function updateEventPaymentConfirmation(int $ticketId): void
    {
        $eventTicketOrder = TicketOrder::findOrFail($ticketId);
        $eventTicketOrder->is_ticket_payment_confirmed = true;
        $eventTicketOrder->save();
    }
}
