<?php

namespace Modules\Category\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Category\Models\Category;

class CategoryRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function find(string|int $id): Category
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Category
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