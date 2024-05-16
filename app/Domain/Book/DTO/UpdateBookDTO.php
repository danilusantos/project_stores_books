<?php

namespace App\Domain\Book\DTO;

use App\Http\Requests\Api\Book\UpdateBookRequest;

class UpdateBookDTO
{
    public function __construct(
        public int $id,
        public ?string $name,
        public ?int $isbn,
        public ?float $value,
    ) {
    }

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
