<?php

namespace App\Jobs;

use App\Mail\NewMembershipMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewMembershipMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $receiver,
        private array $dataNewMembershipEmail,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->receiver)
            ->send(new NewMembershipMail(
                $this->dataNewMembershipEmail
            ));
    }
}
