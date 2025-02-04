<?php

namespace Modules\Product\Services;

use Exception;
use Modules\Product\Models\ProductVideo;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Repositories\ProductVideoRepository;

class ProductVideoService
{
    public function __construct(protected ProductVideoRepository $productVideoRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productVideoRepository->all();
    }

    public function store(array $data): ProductVideo
    {
        return $this->productVideoRepository->store($data);
    }

    public function show(string|int $id): ProductVideo
    {
        return $this->productVideoRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productVideoRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product video.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productVideoRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product video.");
        }
    }
}