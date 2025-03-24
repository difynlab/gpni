<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReferFriendCoursePurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $mail_data)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation of Updated Reference Points'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.refer-friend-course-purchase'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
