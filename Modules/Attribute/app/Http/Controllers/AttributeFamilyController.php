<?php

namespace Modules\Attribute\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Modules\Attribute\Http\Requests\AttributeFamilyStoreRequest;
use Modules\Attribute\Http\Requests\AttributeFamilyUpdateRequest;
use Modules\Attribute\Services\AttributeFamilyService;
use Modules\Core\Http\Controllers\CoreController;

class AttributeFamilyController extends CoreController
{
    public function __construct(protected AttributeFamilyService $attributeFamilyService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $attributeFamilies = $this->attributeFamilyService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getCode(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attribute families fetched successfully.',
            payload: [
                'attribute_families' => $attributeFamilies,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeFamilyStoreRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['status'] ??= false;
            $data['is_user_defined'] ??= true;

            $attributeFamily = $this->attributeFamilyService->store($data);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute family created successfully.',
            payload: [
                'attribute_family' => $attributeFamily,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $attributeFamily = $this->attributeFamilyService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute family fetched successfully.',
            payload: [
                'attribute_family' => $attributeFamily,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeFamilyUpdateRequest $request, string|int $id)
    {
        try {
            $data = $request->validated();

            $this->attributeFamilyService->update($id, $data);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute family updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        try {
            $this->attributeFamilyService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute family deleted successfully.'
        );
    }
}
