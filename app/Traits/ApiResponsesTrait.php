<?php

namespace App\Traits;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\EmptyResourceCollection;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponsesTrait
{
    public function parseGivenData($data = [], $statusCode = Response::HTTP_OK, $headers = []): array
    {
        $responseStructure = [
            'success' => $data['success'],
            'message' => $data['message'] ?? null,
            'result' => $data['result'] ?? null,
        ];
        if (isset($data['errors'])) {
            $responseStructure['errors'] = $data['errors'];
        }
        if (isset($data['status'])) {
            $statusCode = $data['status'];
        }


        if (isset($data['exception']) && ($data['exception'] instanceof Error || $data['exception'] instanceof Exception)) {
            if (config('app.env') !== 'production') {
                $responseStructure['exception'] = [
                    'message' => $data['exception']->getMessage(),
                    'file' => $data['exception']->getFile(),
                    'line' => $data['exception']->getLine(),
                    'code' => $data['exception']->getCode(),
                    'trace' => $data['exception']->getTrace(),
                ];
            }

            if ($statusCode === Response::HTTP_OK) {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            }
        }
        if ($data['success'] === false) {
            if (isset($data['error_code'])) {
                $responseStructure['error_code'] = $data['error_code'];
            } else {
                $responseStructure['error_code'] = 1;
            }
        }
        return ["content" => $responseStructure, "statusCode" => $statusCode, "headers" => $headers];
    }


    protected function apiResponse($data = [], $statusCode = Response::HTTP_OK, $headers = []): JsonResponse
    {
        $result = $this->parseGivenData($data, $statusCode, $headers);

        return response()->json(
            $result['content'], $result['statusCode'], $result['headers']
        );
    }

    protected function respondSuccess($message = ''): JsonResponse
    {
        return $this->apiResponse(['success' => true, 'message' => $message]);
    }

    protected function respondNoContent($message = 'No Content Found'): JsonResponse
    {
        return $this->apiResponse(['success' => false, 'message' => $message], Response::HTTP_NO_CONTENT);
    }

    protected function respondNotFound($message = 'Not Found'): JsonResponse
    {
        return $this->respondError($message, Response::HTTP_NOT_FOUND);
    }

    protected function respondForbidden($message = 'Forbidden'): JsonResponse
    {
        return $this->respondError($message, Response::HTTP_FORBIDDEN);
    }

    protected function respondError($message, int $statusCode = Response::HTTP_BAD_REQUEST, Exception $exception = null, int $error_code = 1)
    {
        return $this->apiResponse(
            [
                'success' => false,
                'message' => $message ?? 'There was an internal error, Please try again later',
                'exception' => $exception,
                'error_code' => $error_code
            ], $statusCode
        );
    }

    
    protected function respondWithResourceCollection(ResourceCollection $resourceCollection, $statusCode = Response::HTTP_OK, $headers = []): JsonResponse
    { 
        return $this->apiResponse(
            [
                'success' => true,
                'result' => $resourceCollection->response()->getData()
            ], $statusCode, $headers
        );
    }

    protected function respondWithResource(JsonResource $resource, $message = null, $statusCode = Response::HTTP_OK, $headers = []): JsonResponse
    {
        return $this->apiResponse([
            'success' => true,
            'result' => $resource,
            'message' => $message
        ], $statusCode, $headers);
    }
}