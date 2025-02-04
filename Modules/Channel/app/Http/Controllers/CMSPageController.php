<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Channel\Http\Requests\CMSPageStoreRequest;
use Modules\Channel\Http\Requests\CMSPageUpdateRequest;
use Modules\Channel\Services\CMSPageService;
use Modules\Core\Http\Controllers\CoreController;

class CMSPageController extends CoreController
{
    public function __construct(protected CMSPageService $cmsPageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $cmsPages = $this->cmsPageService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'CMS pages fetched successfully.',
            payload: [
                'cms_page' => $cmsPages,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CMSPageStoreRequest $request): JsonResponse
    {
        try {
            $cmsPage = $this->cmsPageService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page stored successfully.',
            payload: [
                'cms_page' => $cmsPage,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        try {
            $cmsPage = $this->cmsPageService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page fetched successfully.',
            payload: [
                'cms_page' => $cmsPage,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CMSPageUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->cmsPageService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->cmsPageService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page deleted successfully.',
        );
    }
}
