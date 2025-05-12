<?php

namespace App\Services;

use App\Repositories\CardTokenRepositoryInterface;

class CardTokenService
{
    public function __construct(
        private CardTokenRepositoryInterface $cardTokenRepository,
        private RsaEncryptionService $rsa
    ) {}

    public function indexClient($clientId)
    {
        return $this->cardTokenRepository->indexClient($clientId);
    }

    public function tokenizeCard($data)
    {
        $cardNumber = $data['card']['number'];

        $encrypted = $this->rsa->encrypt($cardNumber);
        $token = 'tok_' . substr(md5($encrypted), 0, 16);
        $masked = $this->maskCardNumber($cardNumber);
        $brand = $this->getCardBrand($cardNumber);

        $cardToken = [
            'token' => $token,
            'encrypted_data' => $encrypted,
            'masked_number' => $masked,
            'brand' => $brand,
            'client_id' => $data['client_id'],
        ];

        return $this->cardTokenRepository->store($cardToken);
    }

    public function updateTokenizedCard($id, $data)
    {
        $cardNumber = $data['casrd']['number'];

        $encrypted = $this->rsa->encrypt($cardNumber);
        $token = 'tok_' . substr(md5($encrypted), 0, 16);
        $masked = $this->maskCardNumber($cardNumber);
        $brand = $this->getCardBrand($cardNumber);

        $cardToken = [
            'token' => $token,
            'encrypted_data' => $encrypted,
            'masked_number' => $masked,
            'brand' => $brand,
        ];

        return $this->cardTokenRepository->update($id, $cardToken);
    }

    public function deleteTokenizedCard($id)
    {
        return $this->cardTokenRepository->delete($id);
    }

    private function maskCardNumber(string $cardNumber): string
    {
        $clean = preg_replace('/\D/', '', $cardNumber);
        return str_repeat('*', strlen($clean) - 4) . substr($clean, -4);
    }

    private function getCardBrand(string $cardNumber): string
    {
        $clean = preg_replace('/\D/', '', $cardNumber);

        if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $clean)) {
            return 'VISA';
        }

        if (
            preg_match('/^5[1-5][0-9]{14}$/', $clean) ||
            preg_match('/^2(2[2-9][0-9]{2}|[3-6][0-9]{3}|7[01][0-9]{2}|720[0-9]{2})[0-9]{10}$/', $clean)
        ) {
            return 'MASTERCARD';
        }

        return 'UNKNOWN';
    }
}
