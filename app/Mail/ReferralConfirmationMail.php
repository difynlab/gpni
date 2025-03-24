<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReferralConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $user)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Friend Has Registered!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.referral-confirmation',
            with: ['user' => $this->user]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
