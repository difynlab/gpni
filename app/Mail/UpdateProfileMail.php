<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpdateProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $mail_data)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Profile Updated Successfully'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.update-profile'
        );
    }
}
