<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RenewalMembershipMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $dataRenewalMembershipEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(array $dataRenewalMembershipEmail)
    {
        $this->dataRenewalMembershipEmail = $dataRenewalMembershipEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Membresía renovada automáticamente!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       return new Content(
            view: 'emails.renewal-membership',
            with: [
                'dataRenewalMembershipEmail' => $this->dataRenewalMembershipEmail,
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
