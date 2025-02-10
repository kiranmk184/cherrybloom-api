<?php

namespace Modules\Locale\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Locale\Models\Locale;

class LocaleRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Locale();
    }

    public function find(string|int $id): Locale
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Locale
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
