<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;

    public function __construct($student)
    {
        $this->student = $student;
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
            view: 'mail.profile-updated',
            with: [
                'mail_data' => [
                    'name' => $this->student->name ?? 'Student' // Default name if null
                ]
            ]
        );
    }
}
