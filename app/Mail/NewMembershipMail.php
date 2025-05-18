<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewMembershipMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $dataNewMembershipEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(array $dataNewMembershipEmail)
    {
        $this->dataNewMembershipEmail = $dataNewMembershipEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Bienvenido/a al Club!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-membership',
            with: [
                'dataNewMembershipEmail' => $this->dataNewMembershipEmail,
            ]
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
