<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Models\Book;
use stdClass;

/**
 * Repository class for interacting with book data.
 */
class BookRepository
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
}
