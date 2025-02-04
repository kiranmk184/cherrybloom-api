<?php

namespace Modules\Channel\Services;

use Exception;
use Modules\Channel\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Repositories\SliderRepository;

class SliderService
{
    public function __construct(protected SliderRepository $sliderRepository)
    {
    }

    public function index(): Collection
    {
        return $this->sliderRepository->all();
    }

    public function show(string|int $id): Slider
    {
        return $this->sliderRepository->find($id);
    }

    public function store(array $data): Slider
    {
        return $this->sliderRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->sliderRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update slider.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->sliderRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete slider.');
        }
    }
}