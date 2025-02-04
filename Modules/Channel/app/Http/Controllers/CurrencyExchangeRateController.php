<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Channel\Http\Requests\CurrencyExchangeRateStoreRequest;
use Modules\Channel\Http\Requests\CurrencyExchangeRateUpdateRequest;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Channel\Services\CurrencyExchangeRateService;

class CurrencyExchangeRateController extends CoreController
{
    public function __construct(protected CurrencyExchangeRateService $currencyExchangeRateService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $currencyExchangeRates = $this->currencyExchangeRateService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Currency exchange rates fetched successfully.',
            payload: [
                'currency_exchange_rates' => $currencyExchangeRates,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyExchangeRateStoreRequest $request): JsonResponse
    {
        try {
            $currencyExchangeRate = $this->currencyExchangeRateService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency exchange rate stored successfully.',
            payload: [
                'currency_exchange_rate' => $currencyExchangeRate,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $currencyExchangeRate = $this->currencyExchangeRateService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency exchange rate fetched successfully.',
            payload: [
                'currency_exchange_rate' => $currencyExchangeRate,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyExchangeRateUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->currencyExchangeRateService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency exchange rate updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->currencyExchangeRateService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency exchange rate deleted successfully.',
        );
    }
}
