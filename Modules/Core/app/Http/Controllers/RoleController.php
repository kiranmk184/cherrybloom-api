<?php

namespace Modules\Core\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Core\Http\Requests\RoleStoreRequest as RequestsRoleStoreRequest;
use Modules\Core\Http\Requests\RoleUpdateRequest as RequestsRoleUpdateRequest;
use Modules\Core\Services\RoleService;

class RoleController extends BaseController
{
    public function __construct(protected RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $roles = $this->roleService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Roles fetched successfully.',
            payload: [
                'roles' => $roles,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsRoleStoreRequest $request): JsonResponse
    {
        try {
            $role = $this->roleService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Role stored successfully.',
            payload: [
                'role' => $role,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $role = $this->roleService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Role fetched successfully.',
            payload: [
                'role' => $role,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsRoleUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->roleService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Role updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->roleService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Role deleted successfully.',
        );
    }
}
