<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'eventTitle' => ['required', 'string'],
            'eventDescription' => ['required', 'string'],
            'eventVenue' => ['required', 'string'],
            'eventOrganizer' => ['required', 'string'],
            'eventCharges' => ['required', 'string'],
            'eventType' => ['required', 'string'],
             'eventImage' => ['required', 'file'],
            //'eventVenueImage' => ['required', 'file'],
            //'eventVenueCapacity' => ['required', 'string'],
        ];
    }
}
