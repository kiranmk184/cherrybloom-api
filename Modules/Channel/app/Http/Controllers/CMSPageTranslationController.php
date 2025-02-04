<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Channel\Http\Requests\CMSPageTranslationStoreRequest;
use Modules\Channel\Http\Requests\CMSPageTranslationUpdateRequest;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Channel\Services\CMSPageTranslationService;

class CMSPageTranslationController extends CoreController
{
    public function __construct(protected CMSPageTranslationService $cmsPageTranslationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $cmsPageTranslations = $this->cmsPageTranslationService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'CMS page translations fetched successfully.',
            payload: [
                'cms_page_translations' => $cmsPageTranslations,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CMSPageTranslationStoreRequest $request): JsonResponse
    {
        try {
            $cmsPageTranslation = $this->cmsPageTranslationService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page translation stored successfully.',
            payload: [
                'cms_page_translation' => $cmsPageTranslation,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $cmsPageTranslation = $this->cmsPageTranslationService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page translation fetched successfully.',
            payload: [
                'cms_page_translation' => $cmsPageTranslation,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CMSPageTranslationUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->cmsPageTranslationService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page translation updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->cmsPageTranslationService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'CMS page translation deleted successfully.',
        );
    }
}
