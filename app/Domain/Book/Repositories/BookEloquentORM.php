<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use App\Domain\Book\Repositories\BookRepositoryInterface;
use App\Domain\Book\Models\Book;
use stdClass;

/**
 * Repository class for interacting with book data using Eloquent ORM.
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

    /**
     * Paginate and retrieve books.
     *
     * @param  int  $page The page number.
     * @param  int  $totalPerPage The number of items per page.
     * @param  string|null  $filter Optional filter criteria.
     * @return array The paginated list of books.
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
                    $query->orWhere('isbn', 'like', "%{$filter}%");
                    $query->orWhere('id', $filter);
                }
            })
            ->with(['stores' => function ($query) {
                $query->select('name', 'address', 'active');
            }])
            ->paginate($totalPerPage, ["*"], 'page', $page)
            ->toArray();
    }

    /**
     * Find a book by ID.
     *
     * @param  string  $id The ID of the book.
     * @return stdClass|null The found book or null if not found.
     */
    public function findOne(string $id): stdClass|null
    {
        if (! $book = $this->model->with(['stores'])->find($id)) {
            return null;
        }

        return (object) $book->toArray();
    }

    /**
     * Delete a book by ID.
     *
     * @param  string  $id The ID of the book to delete.
     * @return void
     */
    public function delete(string $id): void
    {
        $this->model
            ->findOrFail($id)
            ->delete();
    }

    /**
     * Create a new book.
     *
     * @param  CreateBookDTO  $dto The data transfer object for creating a book.
     * @return stdClass The created book.
     */
    public function new(CreateBookDTO $dto): stdClass
    {
        return (object) $this->model->create(
            (array) $dto
        )->toArray();
    }

    /**
     * Update an existing book.
     *
     * @param  UpdateBookDTO  $dto The data transfer object for updating a book.
     * @return stdClass|null The updated book or null if update failed.
     */
    public function update(UpdateBookDTO $dto): stdClass|null
    {
        if (! $book = $this->model->find($dto->id)) {
            return null;
        }

        $book->update((array) $dto);

        return (object) $book->toArray();
    }
}
