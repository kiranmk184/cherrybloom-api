<?php

namespace Modules\Channel\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Channel\Models\Currency;
use Modules\Channel\Models\CurrencyExchangeRate;
use Modules\Core\Repositories\BaseRepository;

class CurrencyExchangeRateRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new CurrencyExchangeRate();
    }

    public function getExchangeRates(Currency $currency): Collection
    {
        return $currency->currencyExchangeRates()->get();
    }

    public function getExchangeRate(Currency $currency, string|int $id): CurrencyExchangeRate
    {
        return $currency->currencyExchangeRates()->findOrFail($id);
    }

    public function storeExchangeRate(Currency $currency, array $data): CurrencyExchangeRate
    {
        return $currency->currencyExchangeRates()->create($data);
    }

    public function updateExchangeRate(Currency $currency, string|int $id, array $data): bool
    {
        $currencyExchangeRate = $this->getExchangeRate($currency, $id);
        return $currencyExchangeRate->update($data);
    }

    public function deleteExchangeRate(Currency $currency, string|int $id): bool
    {
        $currencyExchangeRate = $this->getExchangeRate($currency, $id);
        return $currencyExchangeRate->delete();
    }
}