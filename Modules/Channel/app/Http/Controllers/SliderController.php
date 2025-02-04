<?php

namespace Modules\Channel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Channel\Http\Requests\SliderStoreRequest;
use Modules\Channel\Http\Requests\SliderUpdateRequest;
use Modules\Channel\Services\SliderService;
use Modules\Core\Http\Controllers\CoreController;

class SliderController extends CoreController
{
    public function __construct(protected SliderService $sliderService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $sliders = $this->sliderService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Sliders fetched successfully.',
            payload: [
                'sliders' => $sliders,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request): JsonResponse
    {
        try {
            $slider = $this->sliderService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Slider stored successfully.',
            payload: [
                'slider' => $slider,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $slider = $this->sliderService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Slider fetched successfully.',
            payload: [
                'slider' => $slider,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->sliderService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Slider updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->sliderService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Slider deleted successfully.',
        );
    }
}
