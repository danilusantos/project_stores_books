<?php

namespace App\Domain\Book\Services;

use App\Domain\Book\Repositories\BookRepository;
use stdClass;

/**
 * Service class for operations related to books.
 */
class BookService
{
    protected $bookRepository;

    /**
     * Constructor for the BookService class.
     *
     * @param  BookRepository  $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
}
