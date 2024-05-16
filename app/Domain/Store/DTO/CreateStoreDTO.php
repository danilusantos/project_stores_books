<?php

namespace App\Domain\Store\DTO;

use App\Http\Requests\Api\Store\CreateStoreRequest;

class CreateStoreDTO
{
    public ?string $name;


    public ?string $address;


    public ?bool $active;


    public function __construct(
        string $name,
        ?string $address,
        ?bool $active
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->active = $active;
    }


    public static function makeFromRequest(CreateStoreRequest $request): self
    {
        return new self(
            $request->name,
            $request->address,
            $request->active
        );
    }
}
