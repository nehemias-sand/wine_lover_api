<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentService $paymentService
    ) {}

    public function handlePayment(Request $request)
    {
        $receivedSignature = $request->header('X-Signature');
        $computedSignature = hash_hmac(
            'sha256',
            $request->getContent(),
            Config::get('services.webhook_payment.secret')
        );

        if (!hash_equals($receivedSignature, $computedSignature)) {
            Log::warning('Webhook con firma inválida', ['expected' => $computedSignature, 'received' => $receivedSignature]);
            abort(403, 'Firma inválida');
        }

        $data = $request->only([
            'cardToken',
            'monto',
            'configuracion',
            'nombre',
            'apellido',
            'email',
            'ciudad',
            'direccion',
            'telefono',
            'datosAdicionales',
        ]);

        $this->paymentService->handlePaymentWebhook($data);
        
        return ApiResponseClass::sendResponse(null, null, 204);
    }
}
