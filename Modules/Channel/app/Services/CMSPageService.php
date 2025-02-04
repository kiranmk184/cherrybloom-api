<?php

namespace Modules\Channel\Services;

use Exception;
use Modules\Channel\Models\CMSPage;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Repositories\CMSPageRepository;

class CMSPageService
{
    public function __construct(protected CMSPageRepository $cmsPageRepository)
    {
    }

    public function index(): Collection
    {
        return $this->cmsPageRepository->all();
    }

    public function show(string|int $id): CMSPage
    {
        return $this->cmsPageRepository->find($id);
    }

    public function store(array $data): CMSPage
    {
        return $this->cmsPageRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->cmsPageRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update CMS page.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->cmsPageRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete CMS page.');
        }
    }
}