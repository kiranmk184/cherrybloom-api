<?php

namespace Modules\Channel\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\Channel;

class ChannelRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Channel();
    }

    public function find(string|int $id): Channel
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Channel
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
