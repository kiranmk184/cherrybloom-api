<?php

namespace Modules\Product\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductReviewImage;
use Modules\Product\Repositories\ProductReviewImageRepository;

class ProductReviewImageService
{
    public function __construct(protected ProductReviewImageRepository $productReviewImageRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productReviewImageRepository->all();
    }

    public function store(array $data): ProductReviewImage
    {
        return $this->productReviewImageRepository->store($data);
    }

    public function show(string|int $id): ProductReviewImage
    {
        return $this->productReviewImageRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productReviewImageRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product review image.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productReviewImageRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product review image.");
        }
    }
}