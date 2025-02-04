<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\ProductVideo;
use Illuminate\Database\Eloquent\Collection;

class ProductVideoRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductVideo();
    }

    public function find(string|int $id): ProductVideo
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): ProductVideo
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