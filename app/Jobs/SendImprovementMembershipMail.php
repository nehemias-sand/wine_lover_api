<?php

namespace App\Jobs;

use App\Mail\ImprovementMembershipMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendImprovementMembershipMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $receiver,
        private array $dataImprovementMembershipEmail,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->receiver)
            ->send(new ImprovementMembershipMail(
                $this->dataImprovementMembershipEmail
            ));
    }
}
