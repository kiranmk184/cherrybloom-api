<?php

namespace Modules\Inventory\Repositories;

use Modules\Inventory\Models\Inventory;
use Illuminate\Database\Eloquent\Collection;

class InventoryRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Inventory();
    }

    public function find(string|int $id): Inventory
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Inventory
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