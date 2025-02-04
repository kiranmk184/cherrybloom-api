<?php

namespace Modules\Attribute\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Attribute\Http\Requests\AttributeStoreRequest;
use Modules\Attribute\Http\Requests\AttributeUpdateRequest;
use Modules\Attribute\Services\AttributeService;
use Modules\Core\Http\Controllers\CoreController;

class AttributeController extends CoreController
{
    public function __construct(protected AttributeService $attributeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $attributes = $this->attributeService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attributes fetched successfully',
            payload: [
                'attributes' => $attributes,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeStoreRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $attribute = $this->attributeService->store(
                $request->except('attribute_group_id'),
                $request->get('attribute_group_id')
            );
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attributes created successfully',
            payload: [
                'attribute' => $attribute,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id)
    {
        try {
            $attribute = $this->attributeService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attribute fetched successfully',
            payload: [
                'attribute' => $attribute,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->attributeService->update($id, $request->validated());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attribute updated successfully',
            payload: [

            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->attributeService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attribute deleted successfully',
        );
    }
}
