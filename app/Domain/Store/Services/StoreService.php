<?php

namespace App\Domain\Store\Services;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use App\Domain\Store\Repositories\StoreRepositoryInterface;
use stdClass;

class StoreService
{
    public function __construct(
        protected StoreRepositoryInterface $repository
    ) {
    }

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

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateStoreDTO $dto): stdClass|null
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateStoreDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
