<?php

namespace Modules\Channel\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\CMSPageTranslation;

class CMSPageTranslationRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new CMSPageTranslation();
    }

    public function find(string|int $id): CMSPageTranslation
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): CMSPageTranslation
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