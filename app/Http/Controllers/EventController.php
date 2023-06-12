<?php

namespace App\Http\Controllers;

use App\Http\Helper\Country;
use App\Http\Helper\CurrencyConverter;
use App\Http\Requests\EventRequest;
use App\Http\Requests\TicketOrderRequest;
use App\Http\Services\EventService;
use App\Models\Event;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EventController extends BaseController
{

    private EventService $eventService;

    /**
     * @param EventService $eventService
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
        Parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Event List";
        $events = $this->eventService->getAllEvents();
        $defaultCurrencySymbol = CurrencyConverter::DEFAULT_CURRENCY["symbol"];
        return view("event.index", compact("events","pageTitle","defaultCurrencySymbol"));
    }

    public function eventList(){
        $pageTitle = "Event List";
        $events = $this->eventService->getAllEvents();
        return view("event.index", compact("events","pageTitle"));
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
        return $this->eventService->buyEventTicket($request);
    }

}
