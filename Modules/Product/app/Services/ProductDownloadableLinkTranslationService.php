<?php

namespace Modules\Product\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductDownloadableLinkTranslation;
use Modules\Product\Repositories\ProductDownloadableLinkTranslationRepository;

class ProductDownloadableLinkTranslationService
{
    public function __construct(protected ProductDownloadableLinkTranslationRepository $productDownloadableLinkTranslationRepository)
    {
    }

    public function index(): Collection
    {
        return $this->productDownloadableLinkTranslationRepository->all();
    }

    public function store(array $data): ProductDownloadableLinkTranslation
    {
        return $this->productDownloadableLinkTranslationRepository->store($data);
    }

    public function show(string|int $id): ProductDownloadableLinkTranslation
    {
        return $this->productDownloadableLinkTranslationRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->productDownloadableLinkTranslationRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update product downloadable link translation.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->productDownloadableLinkTranslationRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete product downloadable link translation.");
        }
    }
}