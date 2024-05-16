<?php

namespace App\Domain\Book\Services;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use App\Domain\Book\Repositories\BookRepositoryInterface;
use stdClass;

/**
 * Service class for operations related to books.
 */
class BookService
{
    /**
     * Constructor for the BookService class.
     *
     * @param  BookRepositoryInterface  $repository
     */
    public function __construct(
        protected BookRepositoryInterface $repository
    ) {
    }

    /**
     * Paginate and retrieve books.
     *
     * @param  int  $page The page number.
     * @param  int  $totalPerPage The number of items per page.
     * @param  string|null  $filter Optional filter criteria.
     * @return mixed The paginated list of books.
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
     * Find a book by ID.
     *
     * @param  string  $id The ID of the book.
     * @return stdClass|null The found book or null if not found.
     */
    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    /**
     * Create a new book.
     *
     * @param  CreateBookDTO  $dto The data transfer object for creating a book.
     * @return stdClass|null The created book or null if creation failed.
     */
    public function new(CreateBookDTO $dto): stdClass|null
    {
        return $this->repository->new($dto);
    }

    /**
     * Update an existing book.
     *
     * @param  UpdateBookDTO  $dto The data transfer object for updating a book.
     * @return stdClass|null The updated book or null if update failed.
     */
    public function update(UpdateBookDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    /**
     * Delete a book by ID.
     *
     * @param  string|int  $id The ID of the book to delete.
     * @return void
     */
    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
