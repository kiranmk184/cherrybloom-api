<?php

namespace Modules\Product\Services;

use Exception;
use Modules\Product\Models\FlatProduct;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Repositories\FlatProductRepository;

class FlatProductService
{
    public function __construct(protected FlatProductRepository $flatProductRepository)
    {
    }

    public function index(): Collection
    {
        return $this->flatProductRepository->all();
    }

    public function store(array $data): FlatProduct
    {
        return $this->flatProductRepository->store($data);
    }

    public function show(string|int $id): FlatProduct
    {
        return $this->flatProductRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->flatProductRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update flat product.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->flatProductRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete flat product.");
        }
    }
}