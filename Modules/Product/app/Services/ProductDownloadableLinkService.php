<?php

namespace Modules\Product\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductDownloadableLink;
use Modules\Product\Repositories\ProductDownloadableLinkRepository;

class ProductDownloadableLinkService
{
    public function __construct(protected ProductDownloadableLinkRepository $productDownloadableLinkRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productDownloadableLinkRepository->all();
    }

    public function store(array $data): ProductDownloadableLink
    {
        return $this->productDownloadableLinkRepository->store($data);
    }

    public function show(string|int $id): ProductDownloadableLink
    {
        return $this->productDownloadableLinkRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productDownloadableLinkRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product downloadable link.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productDownloadableLinkRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product downloadable link.");
        }
    }
}