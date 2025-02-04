<?php

namespace Modules\Channel\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\CMSPageTranslation;
use Modules\Channel\Repositories\CMSPageTranslationRepository;

class CMSPageTranslationService
{
    public function __construct(protected CMSPageTranslationRepository $cmsPageTranslationRepository)
    {
    }

    public function index(): Collection
    {
        return $this->cmsPageTranslationRepository->all();
    }

    public function show(string|int $id): CMSPageTranslation
    {
        return $this->cmsPageTranslationRepository->find($id);
    }

    public function store(array $data): CMSPageTranslation
    {
        return $this->cmsPageTranslationRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->cmsPageTranslationRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update CMS page translation.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->cmsPageTranslationRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete CMS page translation.');
        }
    }
}