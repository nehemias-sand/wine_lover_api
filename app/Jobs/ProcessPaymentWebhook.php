<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class ProcessPaymentWebhook implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private array $payload,
        private string $signature
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::withHeaders([
            'X-Signature' => $this->signature,
        ])->post($this->payload['configuracion']['urlWebhook'], $this->payload);
    }
}
