<?php

namespace App\Domain\Book\DTO;

use App\Http\Requests\Api\Book\CreateBookRequest;

class CreateBookDTO
{
    public function __construct(
        public string $name,
        public ?int $isbn,
        public ?float $value,
    ) {
    }

    public static function makeFromRequest(CreateBookRequest $request): self
    {
        return new self(
            $request->name,
            $request->isbn,
            $request->value
        );
    }
}
