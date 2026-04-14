<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FerreMax - Nuevo contacto web: ' . $this->contactData['fname'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
