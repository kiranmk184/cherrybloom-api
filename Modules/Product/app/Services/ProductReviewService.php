<?php

namespace Modules\Product\Services;

use Exception;
use Modules\Product\Models\ProductReview;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Repositories\ProductReviewRepository;

class ProductReviewService
{
    public function __construct(protected ProductReviewRepository $productReviewRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productReviewRepository->all();
    }

    public function store(array $data): ProductReview
    {
        return $this->productReviewRepository->store($data);
    }

    public function show(string|int $id): ProductReview
    {
        return $this->productReviewRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productReviewRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product review.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productReviewRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product review.");
        }
    }
}