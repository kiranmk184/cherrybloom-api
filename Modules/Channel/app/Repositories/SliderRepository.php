<?php

namespace Modules\Channel\Repositories;

use Modules\Channel\Models\Slider;
use Illuminate\Database\Eloquent\Collection;

class SliderRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Slider();
    }

    public function find(string|int $id): Slider
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Slider
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