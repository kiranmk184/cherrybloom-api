<?php

namespace Modules\Channel\Services;

use Exception;
use Modules\Channel\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Repositories\CurrencyRepository;

class CurrencyService
{
    public function __construct(protected CurrencyRepository $currencyRepository)
    {
    }

    public function index(): Collection
    {
        return $this->currencyRepository->all();
    }

    public function show(string|int $id): Currency
    {
        return $this->currencyRepository->find($id);
    }

    public function store(array $data): Currency
    {
        return $this->currencyRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->currencyRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update currency.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->currencyRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete currency.');
        }
    }
}