<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReferFriendConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $mail_data)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎉 Your friend is all set!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.refer-friend-confirmation'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
