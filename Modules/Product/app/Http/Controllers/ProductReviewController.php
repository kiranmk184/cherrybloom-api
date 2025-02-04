<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductReviewStoreRequest;
use Modules\Product\Http\Requests\ProductReviewUpdateRequest;
use Modules\Product\Services\ProductReviewService;

class ProductReviewController extends CoreController
{
    public function __construct(protected ProductReviewService $productReviewService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productReviews = $this->productReviewService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product reviews fetched successfully.',
            payload: [
                'product_reviews' => $productReviews,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductReviewStoreRequest $request): JsonResponse
    {
        try {
            $productReview = $this->productReviewService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review created successfully.',
            payload: [
                'product_review' => $productReview
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
           $productReview = $this->productReviewService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review fetched successfully.',
            payload: [
                'product_review' =>$productReview
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductReviewUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productReviewService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productReviewService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product review deleted successfully.'
        );
    }
}
