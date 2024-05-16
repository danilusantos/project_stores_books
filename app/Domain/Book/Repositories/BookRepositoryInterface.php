<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use stdClass;

/**
 * Interface for the book repository.
 */
interface BookRepositoryInterface
{
    /**
     * Paginate and retrieve books.
     *
     * @param  int  $page The page number.
     * @param  int  $totalPerPage The number of items per page.
     * @param  string|null  $filter Optional filter criteria.
     * @return array The paginated list of books.
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): array;

    /**
     * Find a book by ID.
     *
     * @param  string  $id The ID of the book.
     * @return stdClass|null The found book or null if not found.
     */
    public function findOne(string $id): stdClass|null;

    /**
     * Delete a book by ID.
     *
     * @param  string  $id The ID of the book to delete.
     * @return void
     */
    public function delete(string $id): void;

    /**
     * Create a new book.
     *
     * @param  CreateBookDTO  $dto The data transfer object for creating a book.
     * @return stdClass The created book.
     */
    public function new(CreateBookDTO $dto): stdClass;

    /**
     * Update an existing book.
     *
     * @param  UpdateBookDTO  $dto The data transfer object for updating a book.
     * @return stdClass|null The updated book or null if update failed.
     */
    public function update(UpdateBookDTO $dto): stdClass|null;
}
