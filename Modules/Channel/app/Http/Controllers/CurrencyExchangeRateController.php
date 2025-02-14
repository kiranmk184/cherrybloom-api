<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Channel\Http\Requests\CurrencyExchangeRateStoreRequest;
use Modules\Channel\Http\Requests\CurrencyExchangeRateUpdateRequest;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Channel\Services\CurrencyExchangeRateService;

class CurrencyExchangeRateController extends BaseController
{
    public function __construct(protected CurrencyExchangeRateService $currencyExchangeRateService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $currencyExchangeRates = $this->currencyExchangeRateService->index($request->currencyId);
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
            $currencyExchangeRate = $this->currencyExchangeRateService->store($request->currencyId, $request->all());
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
    public function show(Request $request): JsonResponse
    {
        try {
            $currencyExchangeRate = $this->currencyExchangeRateService->show($request->currencyId, $request->id);
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
    public function update(CurrencyExchangeRateUpdateRequest $request): JsonResponse
    {
        try {
            $this->currencyExchangeRateService->update($request->currencyId, $request->id, $request->all());
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
    public function destroy(Request $request): JsonResponse
    {
        try {
            $this->currencyExchangeRateService->delete($request->currencyId, $request->id);
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
