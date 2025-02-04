<?php

namespace Modules\Product\Services;

use Exception;
use Modules\Product\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Repositories\ProductImageRepository;

class ProductImageService
{
    public function __construct(protected ProductImageRepository $productImageRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productImageRepository->all();
    }

    public function store(array $data): ProductImage
    {
        return $this->productImageRepository->store($data);
    }

    public function show(string|int $id): ProductImage
    {
        return $this->productImageRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productImageRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product image.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productImageRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product image.");
        }
    }
}