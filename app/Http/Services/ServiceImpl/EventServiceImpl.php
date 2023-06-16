<?php

namespace App\Http\Services\ServiceImpl;

use App\Http\Helper\CurrencyConverter;
use App\Http\Services\EventService;
use App\Http\Enums\UserRole;
use App\Http\Requests\EventRequest;
use App\Http\Requests\TicketOrderRequest;
use App\Http\Responses\EventResponse;
use App\Http\Responses\TicketOrderResponse;
use App\Http\Services\DocumentMakerService;
use App\Http\Services\MediaManagerService;
use App\Mail\TicketOrderMail;
use App\Models\Event;
use App\Models\TicketOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;

class EventServiceImpl implements EventService
{
    private  MediaManagerService $mediaManagerService;
    private DocumentMakerService $documentMakerService;

    /**
     * @param MediaManagerService $mediaManagerService
     * @param DocumentMakerService $fileGeneratorService
     */
    public function __construct(MediaManagerService $mediaManagerService, DocumentMakerService $documentMakerService)
    {
        $this->mediaManagerService = $mediaManagerService;
        $this->documentMakerService= $documentMakerService;
    }

    /**
     * @param MediaManagerService $mediaManagerService
     */



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

    public function buyEventTicket(TicketOrderRequest $request): array
    {
        $user = $this->registerBasicUserDetails([
            'fullName' => "$request->fullName",
            'country' => $request->country,
            'city' => $request->city,
            'email' =>$request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' =>"evenT@2023",
            'role' => UserRole::ROLE_USER,
        ]);

        $chargesPerTicket = $request->chargesPerTicket;
        $defaultCurrency = CurrencyConverter::DEFAULT_CURRENCY['shortName'];
        $newCurrencyType = $request->currencyType;
        $chargesAfterConversion = CurrencyConverter::getConvertedAmount($chargesPerTicket,$defaultCurrency,$newCurrencyType);
        $totalCharges = $chargesAfterConversion['convertedAmount'] * $request->totalTickets;

        $newTicketId  = TicketOrder::latest()->value('id');

        $eventTicketOrder = new TicketOrder;
        $eventTicketOrder->ticket_order_ref = $newTicketId.rand(10000, 99999);
        $eventTicketOrder->unconverted_charges_per_ticket = $chargesPerTicket;
        $eventTicketOrder->charges_per_ticket = $chargesAfterConversion['convertedAmount'];
        $eventTicketOrder->total_tickets = $request->totalTickets;
        $eventTicketOrder->total_charges = $totalCharges;
        $eventTicketOrder->currency_type = $newCurrencyType;
        $eventTicketOrder->event_id = $request->eventId;
        $eventTicketOrder->user_id = $user->id;

        $eventTicketOrder->save();

        $order = TicketOrderResponse::mapSingleTicketOrder($eventTicketOrder);
        $buyerEmail = $order['userDetails']['email'];

//        Mail::send([], [], function ($message) use ($pdf) {
//            $message->to('recipient@example.com')
//                ->subject('Your PDF Invoice')
//                ->attachData($pdf->output(), 'invoice.pdf');
//        });

        $pdf= $this->documentMakerService->generatePdf([
            "view" => "emails.orders.pdf-ticket-invoice",
            "data"=> ["order"=>$order],
            "fileName"=> "invoice.pdf"
        ]);

//        Mail::to(["olamic695@gmail.com","olamic695@yahoo.com","atopproject@gmail.com"])
//            ->send(new TicketOrderMail($order));

        Mail::send(["html"=>"emails.orders.pdf-ticket-invoice"], ["order" => $order], function ($message) use ($buyerEmail, $pdf) {
            $message->to(["olamic695@gmail.com",$buyerEmail,
                "atopproject@gmail.com","atopprojects555@gmail.com"])
                ->subject('Invoice Receipt')
                ->attachData($pdf->output(), 'invoice.pdf');
        });

        return $order;

    }

    public function getAllOrderedTickets(): array
    {
        $eventTicketOrder = TicketOrder::with('getEvent','getUser')
            ->orderby("is_ticket_payment_confirmed","DESC")
            ->paginate(100);

        return TicketOrderResponse::mapAllTicketOrders($eventTicketOrder);
    }

    public function getOrderedTicketById($id): array
    {
        $eventTicketOrder = TicketOrder::with('getEvent','getUser')->findOrFail($id);
        return TicketOrderResponse::mapSingleTicketOrder($eventTicketOrder);
    }

    public function updateIsEventPaymentConfirmed(int $ticketId)
    {
        $eventTicketOrder = TicketOrder::findOrFail($ticketId);
        $eventTicketOrder->is_ticket_payment_confirmed = !$eventTicketOrder->is_ticket_payment_confirmed;
        $eventTicketOrder->save();

        return $eventTicketOrder->is_ticket_payment_confirmed;
    }
}
