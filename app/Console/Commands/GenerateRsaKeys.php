<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateRsaKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:rsa-keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate RSA Keys';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $res = openssl_pkey_new([
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ]);

        openssl_pkey_export($res, $privateKey);
        $publicKey = openssl_pkey_get_details($res)['key'];

        $path = storage_path('app/private/keys');

        if (!is_dir($path)) {
            mkdir($path, 0755, true); // crea recursivamente la carpeta si no existe
        }

        file_put_contents($path . '/private.pem', $privateKey);
        file_put_contents($path . '/public.pem', $publicKey);

        $this->info('Llaves RSA generadas con éxito.');
    }
}
