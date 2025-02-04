<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\ProductVideoStoreRequest;
use Modules\Product\Http\Requests\ProductVideoUpdateRequest;
use Modules\Product\Services\ProductVideoService;

class ProductVideoController extends CoreController
{
    public function __construct(protected ProductVideoService $productVideoService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $productVideos = $this->productVideoService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product video fetched successfully.',
            payload: [
                'product_video' => $productVideos,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductVideoStoreRequest $request): JsonResponse
    {
        try {
            $productVideo = $this->productVideoService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product video created successfully.',
            payload: [
                'product_video' => $productVideo
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
           $productVideo = $this->productVideoService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product video fetched successfully.',
            payload: [
                'product_video' =>$productVideo
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductVideoUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->productVideoService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product video updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->productVideoService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Product video deleted successfully.'
        );
    }
}
