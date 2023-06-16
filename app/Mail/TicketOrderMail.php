<?php

namespace App\Mail;

use App\Http\Responses\TicketOrderResponse;
use App\Models\TicketOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $order,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@atopprojects.com', 'Atop Projects Ltd'),
            replyTo: [
                new Address('olamic695@gmail.com', 'Atop Projects Ltd'),
            ],
            subject: 'Ticket Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'emails.orders.ticket-invoice',
            text: 'emails.orders.ticket-invoice',
            with: [
                'ticketNumber' => $this->order['ticketOrderRef'],
                'chargesPerTicket' => $this->order['chargesPerTicket'],
                'totalCharges' => $this->order['totalCharges'],
                'totalTickets' => $this->order['totalTickets'],
                'ticketOption' => $this->order['ticketOption'],
                'isPaymentConfirmedStatus' => $this->order['isPaymentConfirmedStatus'],
                'eventDetails' => $this->order['eventDetails'],
                'userDetails' => $this->order['userDetails'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
