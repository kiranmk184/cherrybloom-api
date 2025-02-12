<?php

namespace Modules\Admin\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminRoleStoreRequest;
use Modules\Core\Http\Controllers\BaseController;

class AdminRoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json([]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function attach(AdminRoleStoreRequest $request)
    {
        try {
            dd($request->validated('role_id'));
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Role attached successfully.',
        );
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        //

        return response()->json([]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        return response()->json([]);
    }
}
