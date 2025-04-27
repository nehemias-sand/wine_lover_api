<?php

namespace App\Services;

use App\Http\Resources\PresentationResource;
use App\Http\Resources\ProductImageResource;
use App\Models\ProductPresentation;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepositoryInterface,
        private ProductImageRepositoryInterface $productImageRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->productRepositoryInterface->index($pagination, $filter);
    }

    public function show($id)
    {
        return $this->productRepositoryInterface->show($id);
    }

    public function store(array $data, $presentations, $images)
    {
        $productImages = collect();
        $productPresentations = collect();

        $product = $this->productRepositoryInterface->store($data);

        foreach ($presentations as $presentation) {
            $productPresentation = ProductPresentation::create([
                'product_id' => $product->id,
                'presentation_id' => $presentation['id'],
                'stock' => $presentation['stock'],
                'unit_price' => $presentation['unit_price'],
            ]);

            $productPresentations->push($productPresentation);
        }

        foreach ($images as $index => $image) {
            $extension = $image->extension();
            $fileName = 'product_' . $product->id . $index . time() . '.' . $extension;

            $path = $image->storeAs("images/products/$product->id", $fileName, 'public');

            $productImage = $this->productImageRepositoryInterface->store([
                'url_image' => $path,
                'state' => true,
                'product_id' => $product->id,
            ]);

            $productImages->push($productImage);
        }

        $product->images = ProductImageResource::collection($productImages);
        $product->presentations = PresentationResource::collection($productPresentations);

        return $product;
    }

    public function update($id, array $data)
    {
        return $this->productRepositoryInterface->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepositoryInterface->delete($id);
    }
}
