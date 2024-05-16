<?php

namespace App\Domain\Store\DTO;

use App\Http\Requests\Api\Store\UpdateStoreRequest;

/**
 * Data Transfer Object (DTO) for updating a store.
 */
class UpdateStoreDTO
{
    /**
     * The ID of the store.
     *
     * @var int
     */
    public int $id;

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
     * Constructor for the UpdateStoreDTO class.
     *
     * @param  int  $id The ID of the store.
     * @param  string|null  $name The name of the store.
     * @param  string|null  $address The address of the store.
     * @param  bool|null  $active Indicates if the store is active.
     */
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

    /**
     * Create an UpdateStoreDTO instance from a HTTP request.
     *
     * @param  UpdateStoreRequest  $request The HTTP request.
     * @return UpdateStoreDTO The UpdateStoreDTO instance.
     */
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
