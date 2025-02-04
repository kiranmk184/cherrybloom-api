<?php

namespace Modules\Attribute\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\Attribute;

class AttributeRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Attribute();
    }

    public function find(string|int $id): Attribute
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Attribute
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