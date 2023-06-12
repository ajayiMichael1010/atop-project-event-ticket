<?php

namespace App\Http\Responses;

use App\Models\TicketOrder;
use Illuminate\Database\Eloquent\Collection;

class TicketOrderResponse
{
    public static function mapAllTicketOrders(Collection $ticketOrders): array
    {
        return $ticketOrders->map(fn ($ticketOrder) => self::mapSingleTicketOrder($ticketOrder))->all();
    }

    public static function mapSingleTicketOrder(TicketOrder $ticketOrder): array
    {
        return [
            "id" => $ticketOrder->id,
            "ticketOrderRef" => $ticketOrder->ticket_order_ref,
            "chargesPerTicket" => $ticketOrder->charges_per_ticket,
            "totalTickets" => $ticketOrder->total_tickets,
            "ticket_type" => $ticketOrder->ticket_option,
            "eventDetails" => $ticketOrder->getEvent,
            "userDetails" => $ticketOrder->getUser,
        ];
    }
}
