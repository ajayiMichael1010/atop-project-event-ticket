<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'ticketOrderRef' => ['required', 'string'],
//            'chargesPerTicket' => ['required', 'string'],
//            'totalTickets' => ['required', 'string'],
//            'totalCharges' => ['required', 'string'],
//            'userId' => ['required', 'string'],
//            'eventId' => ['required', 'string'],
        ];
    }
}
