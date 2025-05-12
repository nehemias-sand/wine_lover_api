<?php

namespace App\Services;

use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class ProductImageService
{
    public function __construct(
        private ProductRepositoryInterface $productRepositoryInterface,
        private ProductImageRepositoryInterface $productImageRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->productImageRepositoryInterface->index($pagination, $filter);
    }

    public function show($id)
    {
        return $this->productImageRepositoryInterface->show($id);
    }

    public function store($productId, $images)
    {
        $productImages = collect();

        $product = $this->productRepositoryInterface->show($productId);

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

        return $productImages;
    }

    public function update($id, array $data)
    {
        return $this->productImageRepositoryInterface->update($id, $data);
    }

    public function delete($id)
    {
        $productImage = $this->productImageRepositoryInterface->delete($id);

        if ($productImage) {
            $pathFileToDelete = public_path("/storage/$productImage->url_image");

            if (file_exists($pathFileToDelete)) {
                if (!unlink($pathFileToDelete)) {
                    \Log::error("Error al eliminar el archivo");
                }
            } else {
                \Log::error("Archivo $pathFileToDelete no existe");
            }
        }

        return $productImage;
    }
}
