<?php

namespace App\Repositories\Implementations;

use App\Models\ProductPresentation;
use App\Repositories\ProductPresentationRepositoryInterface;

class ProductPresentationPostgresRepository implements ProductPresentationRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $productPresentations = ProductPresentation::query()
            ->where('product_id', '=', $filter['product_id']);

        if (isset($filter['stock_greater_than_or_equal'])) {
            $productPresentations->where('stock', '>=', $filter['stock_greater_than_or_equal']);
        }

        if (isset($filter['stock_less_than_or_equal'])) {
            $productPresentations->where('stock', '<=', $filter['stock_less_than_or_equal']);
        }

        if ($pagination['paginate']  === 'true') {
            return $productPresentations->paginate($pagination['per_page']);
        }

        return $productPresentations->get();
    }

    public function show($ids)
    {
        $productPresentation = ProductPresentation::query()
            ->where('product_id', '=', $ids['product_id'])
            ->where('presentation_id', '=', $ids['presentation_id'])
            ->first();

        if (!$productPresentation) return null;

        return $productPresentation;
    }

    public function store(array $data)
    {
        return ProductPresentation::create($data);
    }

    public function update($ids, $data)
    {
        ProductPresentation::query()
            ->where('product_id', '=', $ids['product_id'])
            ->where('presentation_id', '=', $ids['presentation_id'])
            ->update($data);

        return $this->show($ids);
    }

    public function delete($ids)
    {
        $productPresentation = $this->show($ids);
        if (!$productPresentation) return null;

        ProductPresentation::query()
            ->where('product_id', '=', $ids['product_id'])
            ->where('presentation_id', '=', $ids['presentation_id'])
            ->delete();

        return $productPresentation;
    }
}
