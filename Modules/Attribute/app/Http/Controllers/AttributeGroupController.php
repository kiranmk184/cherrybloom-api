<?php

namespace Modules\Attribute\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Modules\Attribute\Http\Requests\AttributeGroupStoreRequest;
use Modules\Attribute\Http\Requests\AttributeGroupUpdateRequest;
use Modules\Attribute\Services\AttributeGroupService;
use Modules\Core\Http\Controllers\CoreController;

class AttributeGroupController extends CoreController
{
    public function __construct(protected AttributeGroupService $attributeGroupService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $attributeGroups = $this->attributeGroupService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getCode(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Attribute groups fetched successfully.',
            payload: [
                'attribute_groups' => $attributeGroups,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeGroupStoreRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['position'] ??= 0;
            $data['is_user_defined'] ??= true;

            $attributeGroup = $this->attributeGroupService->store($data);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute group created successfully.',
            payload: [
                'attribute_group' => $attributeGroup,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $attributeGroup = $this->attributeGroupService->find($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute group fetched successfully.',
            payload: [
                'attribute_group' => $attributeGroup,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeGroupUpdateRequest $request, string|int $id)
    {
        try {
            $data = $request->validated();

            $this->attributeGroupService->update($id, $data);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute group updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        try {
            $this->attributeGroupService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Attribute group deleted successfully.'
        );
    }
}
