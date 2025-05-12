<?php

namespace App\Services;

class RsaEncryptionService
{
    protected string $publicKey;
    protected string $privateKey;

    public function __construct()
    {
        $this->publicKey = file_get_contents(storage_path('app/private/keys/public.pem'));
        $this->privateKey = file_get_contents(storage_path('app/private/keys/private.pem'));
    }

    public function encrypt(string $data): string
    {
        openssl_public_encrypt($data, $encrypted, $this->publicKey);
        return base64_encode($encrypted);
    }

    public function decrypt(string $encrypted): string
    {
        openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->privateKey);
        return $decrypted;
    }
}
