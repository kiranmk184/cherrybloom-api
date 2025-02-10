<?php

namespace Modules\Locale\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Locale\Http\Requests\LocaleStoreRequest;
use Modules\Locale\Http\Requests\LocaleUpdateRequest;
use Modules\Locale\Services\LocaleService;

class LocaleController extends CoreController
{
    public function __construct(protected LocaleService $localeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $locales = $this->localeService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Locales fetched successfully.',
            payload: [
                'locales' => $locales,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocaleStoreRequest $request): JsonResponse
    {
        try {
            $locale = $this->localeService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Locale stored successfully.',
            payload: [
                'locale' => $locale,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $locale = $this->localeService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Locale fetched successfully.',
            payload: [
                'locale' => $locale,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocaleUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->localeService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Locale updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->localeService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Locale deleted successfully.',
        );
    }
}
