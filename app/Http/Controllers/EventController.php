<?php

namespace App\Http\Controllers;

use App\Http\Helper\Country;
use App\Http\Helper\CurrencyConverter;
use App\Http\Requests\EventRequest;
use App\Http\Requests\TicketOrderRequest;
use App\Http\Services\DocumentMakerService;
use App\Http\Services\EstateService;
use App\Http\Services\EventService;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class EventController extends BaseController
{
    private EstateService $estateService;
    private EventService $eventService;
    private DocumentMakerService $documentMakerService;

    /**
     * @param EstateService $estateService
     * @param EventService $eventService
     * @param DocumentMakerService $documentMakerService
     */
    public function __construct(EstateService $estateService, EventService $eventService, DocumentMakerService $documentMakerService)
    {
        $this->estateService = $estateService;
        $this->eventService = $eventService;
        $this->documentMakerService = $documentMakerService;
    }

    /**
     * @param EstateService $estateService
     * @param EventService $eventService
     */


    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $pageTitle = "Event List";
        $events = $this->eventService->getAllEvents();
        $defaultCurrencySymbol = CurrencyConverter::DEFAULT_CURRENCY["symbol"];
        $estates = $this->estateService->getEstates();
        return view("event.index", compact("events", "pageTitle","defaultCurrencySymbol","estates"));
    }
    public function index()
    {
        $pageTitle = "Orders ";
       $ticketOrders =  $this->eventService->getAllOrderedTickets();
        return view("event.dashboard", compact(
            "ticketOrders",
            "pageTitle"
        ));
    }

    public function eventList(){
        $pageTitle = "Event List";
        $events = $this->eventService->getAllEvents();
        $defaultCurrencySymbol = CurrencyConverter::DEFAULT_CURRENCY["symbol"];
        return view("event.event-list", compact("events","pageTitle","defaultCurrencySymbol"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Event Registration";
        return view ("event.event-create-form",compact("pageTitle"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
       $this->eventService->createEVent($request);
        return redirect('event/create')->with('status', 'Event added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function showTicketOrders(){
        $pageTitle = "Ticket Orders";
        return view("event.ticket-orders", compact("pageTitle"));
    }

    public function getTicketForm(int $eventId)
    {
        //echo CurrencyConverter::getConvertedAmount(1,"USD" ,"NGN");
        $pageTitle = "Ticket Form";
        $countries = Country::getAllCountries();
        $currencyTypes = CurrencyConverter::CURRENCY_TYPES;
        $event = $this->eventService->getEventById($eventId);
        return view("ticket.ticket-purchase-form",
            compact("countries","event","pageTitle","currencyTypes")
        );
    }

    public function buyTicket(TicketOrderRequest $request)
    {
        $eventTicketOrderResponse = $this->eventService->buyEventTicket($request);

        return response()->json($eventTicketOrderResponse,200, []);
    }

    public function getTicketInvoice()
    {
        return view("event.invoice" , compact([]));
    }

    public function updateIsPaymentConfirmed(int $ticketId): JsonResponse
    {
        $isPaymentConfirmed = $this->eventService->updateIsEventPaymentConfirmed($ticketId);

        return response()->json($isPaymentConfirmed,200,[]);
    }

    public function sendTicket(int $ticketId): JsonResponse
    {
        $this->eventService->sendTicket($ticketId);
        return response()->json("Ticket sent",200,[]);

    }

    public function getServerInfo(){
        phpinfo();
        return view("event.info", []);
    }

}
