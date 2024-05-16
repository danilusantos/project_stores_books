<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\DTO\CreateStoreDTO;
use App\Domain\Store\DTO\UpdateStoreDTO;
use App\Domain\Store\Repositories\StoreRepositoryInterface;
use App\Domain\Store\Models\Store;
use stdClass;

class StoreEloquentORM implements StoreRepositoryInterface
{
    protected Store $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }

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

    public function findOne(string $id): stdClass|null
    {
        if (! $store = $this->model->find($id)) {
            return null;
        }

        return (object) $store->toArray();
    }

    public function delete(string $id): void
    {
        $this->model
            ->findOrFail($id)
            ->delete();
    }

    public function new(CreateStoreDTO $dto): stdClass
    {
        return (object) $this->model->create(
            (array) $dto
        )->toArray();
    }

    public function update(UpdateStoreDTO $dto): stdClass|null
    {
        if (! $store = $this->model->find($dto->id)) {
            return null;
        }

        $store->update((array) $dto);

        return (object) $store->toArray();
    }
}
