<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Membership\AcquireMembershipRequest;
use App\Http\Resources\ClientMembershipResource;
use App\Services\ClientMembershipService;
use Illuminate\Support\Facades\DB;

class MembershipController extends Controller
{
    public function __construct(
        private ClientMembershipService $clientMembershipService
    ) {}

    public function current()
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $currentMembershipPlan = $client->currentMembershipPlan();
        if (!$currentMembershipPlan) return ApiResponseClass::sendResponse(null, "Sin membresia activa", 404);

        return ApiResponseClass::sendResponse(new ClientMembershipResource($currentMembershipPlan));
    }

    public function acquire(AcquireMembershipRequest $request)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $currentMembershipPlan = $client->currentMembershipPlan();

        $data = $request->only([
            'automatic_renewal',
            'card_token_id',
            'address_id',
            'membership_id',
            'plan_id',
            'payment_method_id',
        ]);

        $data['client_id'] = $client->id;

        if ($data['payment_method_id'] !== 1) {
            return ApiResponseClass::sendResponse(null, "Solo se permiten pagos con tarjeta", 400);
        }

        DB::beginTransaction();

        try {
            $clientMembership = $this->clientMembershipService->acquire($data, $currentMembershipPlan);
            DB::commit();

            return ApiResponseClass::sendResponse($clientMembership);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function changeAutomaticRenewal()
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $currentMembershipPlan = $client->currentMembershipPlan();
        $currentMembershipPlan->automatic_renewal = !$currentMembershipPlan->automatic_renewal;
        $currentMembershipPlan->save();

        return ApiResponseClass::sendResponse(null, null, 204);
    }
}
