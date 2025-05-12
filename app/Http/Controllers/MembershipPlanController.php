<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\MembershipPlanResource;
use App\Services\MembershipPlanService;
use Illuminate\Http\Request;

class MembershipPlanController extends Controller
{
    public function __construct(
        private MembershipPlanService $membershipPlanService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['membership_id']);

        $data = $this->membershipPlanService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(MembershipPlanResource::collection($data));
    }
}
