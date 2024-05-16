<?php

namespace App\Domain\Book\DTO;

use App\Http\Requests\Api\Book\UpdateBookRequest;

/**
 * Data Transfer Object (DTO) for updating a book.
 */
class UpdateBookDTO
{
    /**
     * The ID of the book.
     *
     * @var int
     */
    public int $id;

    /**
     * The name of the book.
     *
     * @var string|null
     */
    public ?string $name;

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
     * Constructor for the UpdateBookDTO class.
     *
     * @param  int  $id The ID of the book.
     * @param  string|null  $name The name of the book.
     * @param  int|null  $isbn The ISBN of the book.
     * @param  float|null  $value The value of the book.
     */
    public function __construct(
        int $id,
        ?string $name,
        ?int $isbn,
        ?float $value,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->isbn = $isbn;
        $this->value = $value;
    }

    /**
     * Create an UpdateBookDTO instance from a HTTP request.
     *
     * @param  UpdateBookRequest  $request The HTTP request.
     * @return UpdateBookDTO The UpdateBookDTO instance.
     */
    public static function makeFromRequest(UpdateBookRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->isbn,
            $request->value
        );
    }
}
