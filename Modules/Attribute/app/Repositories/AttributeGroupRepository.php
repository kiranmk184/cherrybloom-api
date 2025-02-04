<?php

namespace Modules\Attribute\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\AttributeGroup;

class AttributeGroupRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new AttributeGroup();
    }

    public function find(string|int $id): AttributeGroup
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): AttributeGroup
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