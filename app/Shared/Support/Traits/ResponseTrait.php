<?php

namespace App\Shared\Support\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

trait ResponseTrait
{
    protected string $resourceItem;

    protected string $resourceCollection;

    protected function respondWithSuccess(array $data): JsonResponse
    {
        return new JsonResponse([
            'data' => $data
        ], Response::HTTP_OK);
    }

    protected function respondWithNoContent(): JsonResponse
    {
        return new JsonResponse([
            'data' => null
        ], Response::HTTP_NO_CONTENT);
    }

    protected function respondWithHttpInternalServerError(array $data): JsonResponse
    {
        return new JsonResponse([
            'data' => $data
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function respondWithHttpBadRequest(array $data): JsonResponse
    {
        return new JsonResponse([
            'data' => $data
        ], Response::HTTP_BAD_REQUEST);
    }

    protected function respondWithCollection(LengthAwarePaginator $collection): ResourceCollection
    {
        return (new $this->resourceCollection($collection));
    }

    protected function respondWithItem(Model $item): JsonResource
    {
        return (new $this->resourceItem($item));
    }
}
