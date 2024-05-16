<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use stdClass;

interface StoreRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): array;

    public function findOne(string $id): stdClass|null;

    public function delete(string $id): void;

    public function new(CreateStoreDTO $dto): stdClass;

    public function update(UpdateStoreDTO $dto): stdClass|null;
}
