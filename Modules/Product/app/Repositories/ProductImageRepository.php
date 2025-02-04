<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;

class ProductImageRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductImage();
    }

    public function find(string|int $id): ProductImage
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): ProductImage
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