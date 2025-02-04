<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductDownloadableLinkTranslation;

class ProductDownloadableLinkTranslationRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductDownloadableLinkTranslation();
    }

    public function find(string|int $id): ProductDownloadableLinkTranslation
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): ProductDownloadableLinkTranslation
    {
        return $this->model->create($data);
    }

    public function update(string|int $id, array $data): bool
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete(string|int $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}