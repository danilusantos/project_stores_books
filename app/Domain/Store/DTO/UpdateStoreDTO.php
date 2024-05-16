<?php

namespace App\Domain\Store\DTO;

use App\Http\Requests\Api\Store\UpdateStoreRequest;

class UpdateStoreDTO
{
    public int $id;


    public ?string $name;


    public ?string $address;


    public ?bool $active;


    public function __construct(
        int $id,
        ?string $name,
        ?string $address,
        ?bool $active
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->active = $active;
    }


    public static function makeFromRequest(UpdateStoreRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->address,
            $request->active
        );
    }
}
