<?php

namespace App\Http\Responses;

use App\Http\Helper\CurrencyConverter;
use App\Models\TicketOrder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketOrderResponse
{
    public static function mapAllTicketOrders(LengthAwarePaginator $ticketOrders): array
    {
        return $ticketOrders->map(fn ($ticketOrder) => self::mapSingleTicketOrder($ticketOrder))->all();
    }

    public static function mapSingleTicketOrder(TicketOrder $ticketOrder): array
    {
        $createdAt = Carbon::parse($ticketOrder->created_at)->format('Y-m-d');
        return [
            "id" => $ticketOrder->id,
            "ticketOrderRef" => $ticketOrder->ticket_order_ref,
            "chargesPerTicket" => CurrencyConverter::currencyFormat($ticketOrder->charges_per_ticket,$ticketOrder->currency_type),
            "totalCharges" => CurrencyConverter::currencyFormat($ticketOrder->total_charges,$ticketOrder->currency_type),
            "totalTickets" => $ticketOrder->total_tickets,
            "ticketOption" => $ticketOrder->ticket_option,
            "invoiceDate" => $createdAt,
            "isPaymentConfirmedStatus" => $ticketOrder->is_ticket_payment_confirmed? "Confirmed":"Not Confirmed",
            "isChecked" => $ticketOrder->is_ticket_payment_confirmed? "checked":"",
            "eventDetails" => $ticketOrder->getEvent,
            "userDetails" => $ticketOrder->getUser,
        ];
    }
}
