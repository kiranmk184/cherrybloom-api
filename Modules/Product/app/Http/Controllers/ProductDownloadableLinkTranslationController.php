<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductDownloadableLinkTranslationStoreRequest;
use Modules\Product\Http\Requests\ProductDownloadableLinkTranslationUpdateRequest;
use Modules\Product\Services\ProductDownloadableLinkTranslationService;

class ProductDownloadableLinkTranslationController extends CoreController
{
    public function __construct(protected ProductDownloadableLinkTranslationService $productDownloadableLinkTranslationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productDownloadableLinkTranslations = $this->productDownloadableLinkTranslationService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link translations fetched successfully.',
            payload: [
                'product_downloadable_link_translations' => $productDownloadableLinkTranslations,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductDownloadableLinkTranslationStoreRequest $request): JsonResponse
    {
        try {
            $productDownloadableLinkTranslation = $this->productDownloadableLinkTranslationService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link translation created successfully.',
            payload: [
                'product_downloadable_link_translation' => $productDownloadableLinkTranslation
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $productDownloadableLinkTranslation = $this->productDownloadableLinkTranslationService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link translation fetched successfully.',
            payload: [
                'product_downloadable_link_translation' => $productDownloadableLinkTranslation
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductDownloadableLinkTranslationUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productDownloadableLinkTranslationService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link translation updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productDownloadableLinkTranslationService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link translation deleted successfully.'
        );
    }
}
