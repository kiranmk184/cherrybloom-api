<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductDownloadableLink;

class ProductDownloadableLinkRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductDownloadableLink();
    }

    public function find(string|int $id): ProductDownloadableLink
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): ProductDownloadableLink
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