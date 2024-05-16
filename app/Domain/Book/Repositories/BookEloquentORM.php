<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use App\Domain\Book\Repositories\BookRepositoryInterface;
use App\Domain\Book\Models\Book;
use stdClass;

/**
 * Repository class for interacting with book data.
 */
class BookEloquentORM implements BookRepositoryInterface
{
    /**
     * Book model instance.
     *
     * @var Book
     */
    protected Book $model;

    /**
     * Constructor for the BookRepository class.
     *
     * @param  Book  $model The Book model instance.
     */
    public function __construct(Book $model)
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
                    $query->orWhere('isbn', 'like', "%{$filter}%");
                    $query->orWhere('id', $filter);
                }
            })
            ->paginate($totalPerPage, ["*"], 'page', $page)
            ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        if (! $book = $this->model->find($id)) {
            return null;
        }

        return (object) $book->toArray();
    }

    public function delete(string $id): void
    {
        $this->model
            ->findOrFail($id)
            ->delete();
    }

    public function new(CreateBookDTO $dto): stdClass
    {
        return (object) $this->model->create(
            (array) $dto
        )->toArray();
    }

    public function update(UpdateBookDTO $dto): stdClass|null
    {
        if (! $book = $this->model->find($dto->id)) {
            return null;
        }

        $book->update((array) $dto);

        return (object) $book->toArray();
    }
}
