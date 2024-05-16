<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use stdClass;

interface BookRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateBookDTO $dto): stdClass;
    public function update(UpdateBookDTO $dto): stdClass|null;
}
