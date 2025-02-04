<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductDownloadableLinkStoreRequest;
use Modules\Product\Http\Requests\ProductDownloadableLinkUpdateRequest;
use Modules\Product\Services\ProductDownloadableLinkService;

class ProductDownloadableLinkController extends CoreController
{
    public function __construct(protected ProductDownloadableLinkService $productDownloadableLinkService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productDownloadableLinks = $this->productDownloadableLinkService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable links fetched successfully.',
            payload: [
                'product_downloadable_links' => $productDownloadableLinks,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductDownloadableLinkStoreRequest $request): JsonResponse
    {
        try {
            $productDownloadableLink = $this->productDownloadableLinkService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link created successfully.',
            payload: [
                'product_downloadable_link' => $productDownloadableLink
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $productDownloadableLink = $this->productDownloadableLinkService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link fetched successfully.',
            payload: [
                'product_downloadable_link' => $productDownloadableLink
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductDownloadableLinkUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productDownloadableLinkService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productDownloadableLinkService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product downloadable link deleted successfully.'
        );
    }
}
