<?php

namespace Modules\Inventory\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Inventory\Services\InventoryService;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Inventory\Http\Requests\InventoryStoreRequest;
use Modules\Inventory\Http\Requests\InventoryUpdateRequest;

class InventoryController extends CoreController
{
    public function __construct(protected InventoryService $inventoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $inventories = $this->inventoryService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Inventories fetched successfully.',
            payload: [
                'inventories' => $inventories,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryStoreRequest $request): JsonResponse
    {
        try {
            $inventory = $this->inventoryService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Inventory created successfully.',
            payload: [
                'inventory' => $inventory
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
           $inventory = $this->inventoryService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Inventory fetched successfully.',
            payload: [
                'inventory' =>$inventory
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryUpdateRequest $request, string|int $id): JsonResponse
    {
        try {
            $this->inventoryService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Inventory updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->inventoryService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Inventory deleted successfully.'
        );
    }
}
