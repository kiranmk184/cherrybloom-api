<?php

namespace Modules\Channel\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\Channel;
use Modules\Channel\Repositories\ChannelRepository;

class ChannelService
{
    public function __construct(protected ChannelRepository $channelRepository)
    {
    }

    public function index(): Collection
    {
        return $this->channelRepository->all();
    }

    public function show(string|int $id): Channel
    {
        return $this->channelRepository->find($id);
    }

    public function store(array $data): Channel
    {
        return $this->channelRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->channelRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update channel.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->channelRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete channel.');
        }
    }
}