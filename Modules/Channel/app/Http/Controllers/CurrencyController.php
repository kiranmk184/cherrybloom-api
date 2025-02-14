<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Modules\Channel\Http\Requests\CurrencyStoreRequest;
use Modules\Channel\Http\Requests\CurrencyUpdateRequest;
use Modules\Channel\Services\CurrencyService;
use Modules\Core\Http\Controllers\BaseController;

class CurrencyController extends BaseController
{
    public function __construct(protected CurrencyService $currencyService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $currencies = $this->currencyService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Currencies fetched successfully.',
            payload: [
                'currencies' => $currencies,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyStoreRequest $request): JsonResponse
    {
        try {
            $currency = $this->currencyService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency stored successfully.',
            payload: [
                'currency' => $currency,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $currency = $this->currencyService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency fetched successfully.',
            payload: [
                'currency' => $currency,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->currencyService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->currencyService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Currency deleted successfully.',
        );
    }
}
