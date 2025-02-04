<?php

namespace Modules\Core\Traits;

trait ResponseMessage
{
    public function successResponse(string $message = '', array|object $payload = [], int $code = 200)
    {
        return $this->response('success', $message, $payload, $code);
    }

    public function errorResponse(string $message = '', array|object $payload = [], int|string $code = 400)
    {
        $code = is_string($code) ? 500 : $code;
        $code = (($code < 400) || ($code > 500)) ? 500 : $code;

        return $this->response('error', $message, $payload, $code);
    }

    public function response(string $status, string $message, array|object $payload, int $code)
    {
        $response = [
            'status' => $status,
            'message' => $message,
        ];

        if (!empty($payload)) {
            $response = array_merge($response, [
                'payload' => $payload
            ]);
        }

        return response()->json($response, $code);
    }
}