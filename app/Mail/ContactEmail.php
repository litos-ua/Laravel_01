<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param  string  $messageContent
     * @return void
     */
    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
        $this->userName = Auth::user() ? Auth::user()->name : 'Guest';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('litos-ua@wp.pl', 'Walentyna Litkiewicz'),
            subject: 'New Contact Message',
            //subject: 'Contact Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.sendContactEmail',
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
