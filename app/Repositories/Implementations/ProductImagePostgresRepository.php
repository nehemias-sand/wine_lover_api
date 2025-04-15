<?php

namespace App\Repositories\Implementations;

use App\Models\ProductImage;
use App\Repositories\ProductImageRepositoryInterface;

class ProductImagePostgresRepository implements ProductImageRepositoryInterface
{
    public function index(array $pagination, array $filter) {
        $productImages = ProductImage::query();

        if (isset($filter['state'])) {
            $productImages->where('state', '=', $filter['state']);
        }

        if (isset($filter['product_id'])) {
            $productImages->where('product_id', '=', $filter['product_id']);
        }

        if ($pagination['paginate']  === 'true') {
            return $productImages->paginate($pagination['per_page']);
        }

        return $productImages->get();
    }

    public function show($id) {
        $productImage = ProductImage::find($id);
        if (!$productImage) return null;

        return $productImage;
    }

    public function store(array $data) {
        return ProductImage::create($data);
    }

    public function update($id, $data) {
        $productImage = $this->show($id);
        if (!$productImage) return null;

        $productImage->update($data);
        return $productImage; 
    }

    public function delete($id) {
        $productImage = $this->show($id);
        if (!$productImage) return null;

        $productImage->delete();
        return $productImage;
    }
}
