<?php

namespace App\Domain\Store\Services;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use App\Domain\Store\Repositories\StoreRepositoryInterface;
use stdClass;

/**
 * Service class for operations related to stores.
 */
class StoreService
{
    /**
     * Store repository instance.
     *
     * @var StoreRepositoryInterface
     */
    protected StoreRepositoryInterface $repository;

    /**
     * Constructor for the StoreService class.
     *
     * @param  StoreRepositoryInterface  $repository The store repository instance.
     */
    public function __construct(
        StoreRepositoryInterface $repository
    ) {
        $this->repository = $repository;
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
    ) {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
        );
    }

    /**
     * Find a store by ID.
     *
     * @param  string  $id The ID of the store.
     * @return stdClass|null The found store or null if not found.
     */
    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    /**
     * Create a new store.
     *
     * @param  CreateStoreDTO  $dto The data transfer object for creating a store.
     * @return stdClass|null The created store or null if creation failed.
     */
    public function new(CreateStoreDTO $dto): stdClass|null
    {
        return $this->repository->new($dto);
    }

    /**
     * Update an existing store.
     *
     * @param  UpdateStoreDTO  $dto The data transfer object for updating a store.
     * @return stdClass|null The updated store or null if update failed.
     */
    public function update(UpdateStoreDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    /**
     * Delete a store by ID.
     *
     * @param  string|int  $id The ID of the store to delete.
     * @return void
     */
    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
