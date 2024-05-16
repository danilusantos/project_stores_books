<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use stdClass;

/**
 * Interface for interacting with store data repositories.
 */
interface StoreRepositoryInterface
{
    /**
     * Paginate and retrieve stores.
     *
     * @param  int  $page The page number.
     * @param  int  $totalPerPage The number of items per page.
     * @param  string|null  $filter Optional filter criteria.
     * @return array The paginated list of stores.
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): array;

    /**
     * Find a store by ID.
     *
     * @param  string  $id The ID of the store.
     * @return stdClass|null The found store or null if not found.
     */
    public function findOne(string $id): stdClass|null;

    /**
     * Delete a store by ID.
     *
     * @param  string  $id The ID of the store to delete.
     * @return void
     */
    public function delete(string $id): void;

    /**
     * Create a new store.
     *
     * @param  CreateStoreDTO  $dto The data transfer object for creating a store.
     * @return stdClass The created store.
     */
    public function new(CreateStoreDTO $dto): stdClass;

    /**
     * Update an existing store.
     *
     * @param  UpdateStoreDTO  $dto The data transfer object for updating a store.
     * @return stdClass|null The updated store or null if update failed.
     */
    public function update(UpdateStoreDTO $dto): stdClass|null;
}
