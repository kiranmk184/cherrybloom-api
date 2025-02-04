<?php

namespace Modules\Channel\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\CurrencyExchangeRate;
use Modules\Channel\Repositories\CurrencyExchangeRateRepository;

class CurrencyExchangeRateService
{
    public function __construct(protected CurrencyExchangeRateRepository $currencyExchangeRateRepository)
    {
    }

    public function index(): Collection
    {
        return $this->currencyExchangeRateRepository->all();
    }

    public function show(string|int $id): CurrencyExchangeRate
    {
        return $this->currencyExchangeRateRepository->find($id);
    }

    public function store(array $data): CurrencyExchangeRate
    {
        return $this->currencyExchangeRateRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->currencyExchangeRateRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update currency exchange rate.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->currencyExchangeRateRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete currency exchange rate.');
        }
    }
}