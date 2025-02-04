<?php

namespace Modules\Product\Services;

use Exception;
use Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Repositories\ProductRepository;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productRepository->all();
    }

    public function store(array $data): Product
    {
        return $this->productRepository->store($data);
    }

    public function show(string|int $id): Product
    {
        return $this->productRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product.");
        }
    }
}