<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use App\Domain\Store\Services\StoreService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\CreateStoreRequest;
use App\Http\Requests\Api\Store\UpdateStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // Total number of stores per page for pagination
    private int $totalPage = 10;

    public function __construct(
        protected StoreService $service
    ) {
        //
    }

    /**
     * Get paginated list of stores.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $stores = $this->service->paginate(
            page: $request->get('page') ?? 1,
            totalPerPage: $this->totalPage,
            filter: $request->get('filter')
        );

        return response()->json($stores, 200);
    }

    /**
     * Store a new store.
     *
     * @param  CreateStoreRequest  $request
     * @return JsonResponse
     */
    public function store(CreateStoreRequest $request): JsonResponse
    {
        $store = $this->service->new(
            CreateStoreDTO::makeFromRequest($request)
        );

        if (! $store) {
            return response()->json(['message' => 'Store not created'], 501);
        }

        return response()->json(['message' => 'Store stored successfully'], 201);
    }

    /**
     * Update an existing store.
     *
     * @param  UpdateStoreRequest  $request
     * @param  string|int  $id
     * @return JsonResponse
     */
    public function update(UpdateStoreRequest $request, $id): JsonResponse
    {
        if(! $store = $this->service->findOne($id)) {
            return redirect()->back();
        }

        if (! $this->service->update(
            UpdateStoreDTO::makeFromRequest($request, $store->id)
        )) {
            return response()->json(['message' => 'Store not updated'], 501);
        }

        return response()->json(['message' => 'Store updated successfully'], 200);
    }

    /**
     * Display the specified store.
     *
     * @param  string|int  $id
     * @return JsonResponse
     */
    public function show(string|int $id): JsonResponse
    {
        if(! $store = $this->service->findOne($id)) {
            return response()->json(['message' => 'Store not found'], 404);
        }

        return response()->json($store, 200);
    }

    /**
     * Remove the specified store from storage.
     *
     * @param  string|int  $id
     * @return JsonResponse
     */
    public function destroy(string|int $id): JsonResponse
    {
        if (! $this->service->findOne($id)) {
            return response()->json(['message' => 'Store not found'], 404);
        }

        $this->service->delete($id);

        return response()->json(['message' => 'Store deleted successfully'], 200);
    }
}
