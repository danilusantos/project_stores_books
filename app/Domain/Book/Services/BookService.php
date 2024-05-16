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
     * @param  BookRepository  $repository
     */
    public function __construct(
        protected BookRepositoryInterface $repository
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

    public function new(CreateBookDTO $dto): stdClass|null
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateBookDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
