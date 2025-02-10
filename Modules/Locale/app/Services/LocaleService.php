<?php

namespace Modules\Locale\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Locale\Models\Locale;
use Modules\Locale\Repositories\LocaleRepository;

class LocaleService
{
    public function __construct(protected LocaleRepository $localeRepository)
    {
    }

    public function index(): Collection
    {
        return $this->localeRepository->all();
    }

    public function show(string|int $id): Locale
    {
        return $this->localeRepository->find($id);
    }

    public function store(array $data): Locale
    {
        return $this->localeRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->localeRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update locale.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->localeRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete locale.');
        }
    }
}