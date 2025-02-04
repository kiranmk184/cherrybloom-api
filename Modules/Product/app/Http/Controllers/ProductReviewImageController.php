<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductReviewImageStoreRequest;
use Modules\Product\Http\Requests\ProductReviewImageUpdateRequest;
use Modules\Product\Services\ProductReviewImageService;

class ProductReviewImageController extends CoreController
{
    public function __construct(protected ProductReviewImageService $productReviewImageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productReviewImages = $this->productReviewImageService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review images fetched successfully.',
            payload: [
                'product_review_images' => $productReviewImages,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductReviewImageStoreRequest $request): JsonResponse
    {
        try {
            $productReviewImage = $this->productReviewImageService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review image created successfully.',
            payload: [
                'product_review_image' => $productReviewImage
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $productReviewImage = $this->productReviewImageService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review image fetched successfully.',
            payload: [
                'product_review_image' => $productReviewImage
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductReviewImageUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productReviewImageService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review image updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productReviewImageService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review image deleted successfully.'
        );
    }
}
