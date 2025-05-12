<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientMembershipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'end_date' => $this->end_date,
            'refund_amount' => $this->refund_amount,
            'price' => $this->price,
            'cashback_percentage' => $this->cashback_percentage,
            'automatic_renewal' => $this->automatic_renewal,
            'membership' => $this->membership->name,
            'plan' => $this->plan->description,
            'payment_track' => $this->paymentStatuses->map(fn($paymentStatus) => [
                'payment_method' => $paymentStatus->paymentMethod->name,
                'payment_status' => $paymentStatus->paymentStatus->name,
                'amount_paid' => $paymentStatus->amount_paid,
                'transaction_id' => $paymentStatus->transaction_id,
                'created_at' => $paymentStatus->created_at,
            ]),
        ];
    }
}
