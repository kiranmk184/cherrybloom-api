<?php

namespace Modules\Channel\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\CurrencyExchangeRate;
use Modules\Channel\Repositories\CurrencyExchangeRateRepository;
use Modules\Channel\Repositories\CurrencyRepository;

class CurrencyExchangeRateService
{
    public function __construct(
        protected CurrencyRepository $currencyRepository,
        protected CurrencyExchangeRateRepository $currencyExchangeRateRepository
    ) {
    }

    public function index(string|int $currencyId): Collection
    {
        $currency = $this->currencyRepository->find($currencyId);
        return $this->currencyExchangeRateRepository->getExchangeRates($currency);
    }

    public function show(string|int $currencyId, string|int $id): CurrencyExchangeRate
    {
        $currency = $this->currencyRepository->find($currencyId);
        return $this->currencyExchangeRateRepository->getExchangeRate($currency, $id);
    }

    public function store(string|int $currencyId, array $data): CurrencyExchangeRate
    {
        $currency = $this->currencyRepository->find($currencyId);
        return $this->currencyExchangeRateRepository->storeExchangeRate($currency, $data);
    }

    public function update(string|int $currencyId, string|int $id, array $data): void
    {
        $currency = $this->currencyRepository->find($currencyId);
        $status = $this->currencyExchangeRateRepository->updateExchangeRate($currency, $id, $data);

        if (!$status) {
            throw new Exception('Failed to update currency exchange rate.');
        }
    }

    public function delete(string|int $currencyId, string|int $id): void
    {
        $currency = $this->currencyRepository->find($currencyId);
        $status = $this->currencyExchangeRateRepository->deleteExchangeRate($currency, $id);

        if (!$status) {
            throw new Exception('Failed to delete currency exchange rate.');
        }
    }
}