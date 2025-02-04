<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductImageStoreRequest;
use Modules\Product\Http\Requests\ProductImageUpdateRequest;
use Modules\Product\Services\ProductImageService;

class ProductImageController extends CoreController
{
    public function __construct(protected ProductImageService $productImageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productImages = $this->productImageService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product images fetched successfully.',
            payload: [
                'product_images' => $productImages,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageStoreRequest $request): JsonResponse
    {
        try {
            $productImage = $this->productImageService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product image created successfully.',
            payload: [
                'product_image' => $productImage
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
           $productImage = $this->productImageService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product image fetched successfully.',
            payload: [
                'product_image' =>$productImage
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productImageService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product image updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productImageService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product image deleted successfully.'
        );
    }
}
