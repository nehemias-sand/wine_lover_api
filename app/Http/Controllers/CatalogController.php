<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\CategoryProductResource;
use App\Http\Resources\MembershipResource;
use App\Http\Resources\PaymentStatusResource;
use App\Http\Resources\PlanResource;
use App\Http\Resources\QualityProductResource;
use App\Http\Resources\UnitMeasurementResource;
use App\Services\CatalogService;

class CatalogController extends Controller
{
    public function __construct(private CatalogService $catalogService) {}

    public function indexQualityProduct()
    {
        $data = $this->catalogService->indexQualityProduct();

        return ApiResponseClass::sendResponse(QualityProductResource::collection($data));
    }

    public function indexCategoryProduct()
    {
        $data = $this->catalogService->indexCategoryProduct();

        return ApiResponseClass::sendResponse(CategoryProductResource::collection($data));
    }

    public function indexUnitMeasurement()
    {
        $data = $this->catalogService->indexUnitMeasurement();

        return ApiResponseClass::sendResponse(UnitMeasurementResource::collection($data));
    }

    public function indexPayentStatus()
    {
        $data = $this->catalogService->indexPaymentStatus();

        return ApiResponseClass::sendResponse(PaymentStatusResource::collection($data));
    }

    public function indexMembership()
    {
        $data = $this->catalogService->indexMembership();

        return ApiResponseClass::sendResponse(MembershipResource::collection($data));
    }

    public function indexPlan()
    {
        $data = $this->catalogService->indexPlan();

        return ApiResponseClass::sendResponse(PlanResource::collection($data));
    }
}
