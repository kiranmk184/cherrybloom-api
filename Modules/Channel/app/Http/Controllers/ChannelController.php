<?php

namespace Modules\Channel\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Channel\Http\Requests\ChannelStoreRequest;
use Modules\Channel\Http\Requests\ChannelUpdateRequest;
use Modules\Channel\Services\ChannelService;
use Modules\Core\Http\Controllers\CoreController;

class ChannelController extends CoreController
{
    public function __construct(protected ChannelService $channelService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $channels = $this->channelService->index();
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode()
            );
        }

        return $this->successResponse(
            message: 'Channels fetched successfully.',
            payload: [
                'channels' => $channels,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChannelStoreRequest $request): JsonResponse
    {
        try {
            $channel = $this->channelService->store($request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Channel stored successfully.',
            payload: [
                'channel' => $channel,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $channel = $this->channelService->show($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Channel fetched successfully.',
            payload: [
                'channel' => $channel,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChannelUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->channelService->update($id, $request->all());
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Channel updated successfully.',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $this->channelService->delete($id);
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: $exception->getCode(),
            );
        }

        return $this->successResponse(
            message: 'Channel deleted successfully.',
        );
    }
}
