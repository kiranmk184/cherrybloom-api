<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function find(string|int $id): Product
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Product
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