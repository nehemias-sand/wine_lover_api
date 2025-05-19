<?php

namespace App\Services;

use App\Repositories\CategoryProductRepositoryInterface;
use App\Repositories\MembershipRepositoryInterface;
use App\Repositories\PaymentStatusRepositoryInterface;
use App\Repositories\PlanRepositoryInterface;
use App\Repositories\ProfileRepositoryInterface;
use App\Repositories\QualityProductRepositoryInterface;
use App\Repositories\UnitMeasurementRepositoryInterface;

class CatalogService
{
    public function __construct(
        private QualityProductRepositoryInterface $qualityProductRepositoryInterface,
        private CategoryProductRepositoryInterface $categoryProductRepositoryInterface,
        private UnitMeasurementRepositoryInterface $unitMeasurementRepositoryInterface,
        private PaymentStatusRepositoryInterface $paymentStatusRepositoryInterface,
        private MembershipRepositoryInterface $membershipRepositoryInterface,
        private PlanRepositoryInterface $planRepositoryInterface,
        private ProfileRepositoryInterface $profileRepositoryInterface,
    ) {}

    public function indexQualityProduct()
    {
        return $this->qualityProductRepositoryInterface->index();
    }

    public function indexCategoryProduct()
    {
        return $this->categoryProductRepositoryInterface->index();
    }

    public function indexUnitMeasurement()
    {
        return $this->unitMeasurementRepositoryInterface->index();
    }

    public function indexPaymentStatus()
    {
        return $this->paymentStatusRepositoryInterface->index();
    }

    public function indexMembership()
    {
        return $this->membershipRepositoryInterface->index();
    }

    public function showMembership($id)
    {
        return $this->membershipRepositoryInterface->show($id);
    }

    public function indexPlan()
    {
        return $this->planRepositoryInterface->index();
    }

    public function indexProfile()
    {
        return $this->profileRepositoryInterface->index();
    }
}
