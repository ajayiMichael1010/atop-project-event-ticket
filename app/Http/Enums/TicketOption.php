<?php

namespace App\Http\Enums;

enum TicketOption: string
{
    case Single = 'SINGLE';
    case Table = 'Table';
    case Group = 'Group';

}
