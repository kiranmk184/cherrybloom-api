<?php

namespace Modules\Attribute\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\AttributeFamily;

class AttributeFamilyRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new AttributeFamily();
    }

    public function find(string|int $id): AttributeFamily
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): AttributeFamily
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