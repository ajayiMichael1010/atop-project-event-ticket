<?php

namespace App\Http\Services;

use App\Http\Requests\EventRequest;
use App\Http\Requests\TicketOrderRequest;
use App\Models\TicketOrder;

interface EventService
{
    //TICKET OPERATIONS
    public function createEVent(EventRequest $request);
    public function updateEvent(EventRequest $request, int $eventId);
    public function getAllEvents();
    public function getEventById(int $eventId);
    public function deleteEventById(int $eventId);

    //TICKET OPERATIONS
    public function buyEventTicket(TicketOrderRequest $request);
    public function getAllOrderedTickets();
    public function updateEventPaymentConfirmation(int $ticketId);
    public function deleteTicketById(int $ticketId);

}
