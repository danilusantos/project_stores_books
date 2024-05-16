<?php

namespace App\Domain\Book\DTO;

use App\Http\Requests\Api\Book\CreateBookRequest;

/**
 * Data Transfer Object (DTO) for creating a book.
 */
class CreateBookDTO
{
    /**
     * The name of the book.
     *
     * @var string
     */
    public string $name;

    /**
     * The ISBN of the book.
     *
     * @var int|null
     */
    public ?int $isbn;

    /**
     * The value of the book.
     *
     * @var float|null
     */
    public ?float $value;

    /**
     * Constructor for the CreateBookDTO class.
     *
     * @param  string  $name The name of the book.
     * @param  int|null  $isbn The ISBN of the book.
     * @param  float|null  $value The value of the book.
     */
    public function __construct(
        string $name,
        ?int $isbn,
        ?float $value,
    ) {
        $this->name = $name;
        $this->isbn = $isbn;
        $this->value = $value;
    }

    /**
     * Create a CreateBookDTO instance from a HTTP request.
     *
     * @param  CreateBookRequest  $request The HTTP request.
     * @return CreateBookDTO The CreateBookDTO instance.
     */
    public static function makeFromRequest(CreateBookRequest $request): self
    {
        return new self(
            $request->name,
            $request->isbn,
            $request->value
        );
    }
}
