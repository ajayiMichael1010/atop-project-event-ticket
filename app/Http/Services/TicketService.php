<?php

namespace App\Http\Services;

use App\Http\Requests\TicketRequest;

interface TicketService
{
    public function buyTicket(TicketRequest $request);
}
