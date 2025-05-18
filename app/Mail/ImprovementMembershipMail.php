<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ImprovementMembershipMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $dataImprovementMembershipEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(array $dataImprovementMembershipEmail)
    {
        $this->dataImprovementMembershipEmail = $dataImprovementMembershipEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tu Membresía Ha Sido Mejorada!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.improvement-membership',
            with: [
                'dataImprovementMembershipEmail' => $this->dataImprovementMembershipEmail,
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
