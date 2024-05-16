<?php

namespace App\Domain\Store\DTO;

use App\Http\Requests\Api\Store\CreateStoreRequest;

/**
 * Data Transfer Object (DTO) for creating a store.
 */
class CreateStoreDTO
{
    /**
     * The name of the store.
     *
     * @var string|null
     */
    public ?string $name;

    /**
     * The address of the store.
     *
     * @var string|null
     */
    public ?string $address;

    /**
     * Indicates if the store is active.
     *
     * @var bool|null
     */
    public ?bool $active;

    /**
     * Constructor for the CreateStoreDTO class.
     *
     * @param  string  $name The name of the store.
     * @param  string|null  $address The address of the store.
     * @param  bool|null  $active Indicates if the store is active.
     */
    public function __construct(
        string $name,
        ?string $address,
        ?bool $active
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->active = $active;
    }

    /**
     * Create a CreateStoreDTO instance from a HTTP request.
     *
     * @param  CreateStoreRequest  $request The HTTP request.
     * @return CreateStoreDTO The CreateStoreDTO instance.
     */
    public static function makeFromRequest(CreateStoreRequest $request): self
    {
        return new self(
            $request->name,
            $request->address,
            $request->active
        );
    }
}
