<?php

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Product\Http\Requests\FlatProductStoreRequest;
use Modules\Product\Http\Requests\FlatProductUpdateRequest;
use Modules\Product\Services\FlatProductService;

class FlatProductController extends CoreController
{
    public function __construct(protected FlatProductService $flatProductService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $flatProducts = $this->flatProductService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Flat products fetched successfully.',
            payload: [
                'flat_products' => $flatProducts,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlatProductStoreRequest $request): JsonResponse
    {
        try {
            $flatProduct = $this->flatProductService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Flat product created successfully.',
            payload: [
                'flat_product' => $flatProduct
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $flatProduct = $this->flatProductService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Flat product fetched successfully.',
            payload: [
                'flat_product' => $flatProduct
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlatProductUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->flatProductService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Flat product updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->flatProductService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Flat product deleted successfully.'
        );
    }
}
