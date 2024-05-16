<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use App\Domain\Store\Repositories\StoreRepositoryInterface;
use App\Domain\Store\Models\Store;
use stdClass;

/**
 * Repository class for interacting with store data using Eloquent ORM.
 */
class StoreEloquentORM implements StoreRepositoryInterface
{
    /**
     * Store model instance.
     *
     * @var Store
     */
    protected Store $model;

    /**
     * Constructor for the StoreEloquentORM class.
     *
     * @param  Store  $model The Store model instance.
     */
    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    /**
     * Paginate and retrieve stores.
     *
     * @param  int  $page The page number.
     * @param  int  $totalPerPage The number of items per page.
     * @param  string|null  $filter Optional filter criteria.
     * @return array The paginated list of stores.
     */
    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): array {

        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', 'like', "%{$filter}%");
                    $query->orWhere('address', 'like', "%{$filter}%");
                }
            })
            ->with(['books' => function ($query) {
                $query->select('name', 'value');
            }])
            ->paginate($totalPerPage, ["*"], 'page', $page)
            ->toArray();
    }

    /**
     * Find a store by ID.
     *
     * @param  string  $id The ID of the store.
     * @return stdClass|null The found store or null if not found.
     */
    public function findOne(string $id): stdClass|null
    {
        if (! $store = $this->model->with(['books'])->find($id)) {
            return null;
        }

        return (object) $store->toArray();
    }

    /**
     * Delete a store by ID.
     *
     * @param  string  $id The ID of the store to delete.
     * @return void
     */
    public function delete(string $id): void
    {
        $this->model
            ->findOrFail($id)
            ->delete();
    }

    /**
     * Create a new store.
     *
     * @param  CreateStoreDTO  $dto The data transfer object for creating a store.
     * @return stdClass The created store.
     */
    public function new(CreateStoreDTO $dto): stdClass
    {
        return (object) $this->model->create(
            (array) $dto
        )->toArray();
    }

    /**
     * Update an existing store.
     *
     * @param  UpdateStoreDTO  $dto The data transfer object for updating a store.
     * @return stdClass|null The updated store or null if update failed.
     */
    public function update(UpdateStoreDTO $dto): stdClass|null
    {
        if (! $store = $this->model->find($dto->id)) {
            return null;
        }

        $store->update((array) $dto);

        return (object) $store->toArray();
    }
}
