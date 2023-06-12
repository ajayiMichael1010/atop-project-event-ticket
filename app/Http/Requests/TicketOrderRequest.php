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
            'event_id' => ['required', 'string'],
            'ticket_order_ref' => ['required', 'string'],
            'charges_per_event' => ['required', 'string'],
            'total_tickets' => ['required', 'string'],
            'user_id' => ['required', 'string'],
        ];
    }
}
