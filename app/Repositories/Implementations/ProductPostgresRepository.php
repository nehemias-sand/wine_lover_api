<?php

namespace App\Repositories\Implementations;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductPostgresRepository implements ProductRepositoryInterface
{
    public function index(array $pagination, array $filter) {
        $products = Product::query();

        if (isset($filter['name'])) {
            $products->where('name', 'ilike', '%' . $filter['name'] . '%');
        }

        if (isset($filter['category_product_id'])) {
            $products->where('category_product_id', '=', $filter['category_product_id']);
        }

        if (isset($filter['quality_product_id'])) {
            $products->where('quality_product_id', '=', $filter['quality_product_id']);
        }

        if ($pagination['paginate']  === 'true') {
            return $products->paginate($pagination['per_page']);
        }

        return $products->get();
    }

    public function show($id) {
        $product = Product::find($id);
        if (!$product) return null;

        return $product;
    }

    public function store(array $data) {
        return Product::create($data);
    }

    public function update($id, $data) {
        $product = $this->show($id);
        if (!$product) return null;

        $product->update($data);
        return $product; 
    }

    public function delete($id) {
        $product = $this->show($id);
        if (!$product) return null;

        $product->delete();
        return $product;
    }
}
