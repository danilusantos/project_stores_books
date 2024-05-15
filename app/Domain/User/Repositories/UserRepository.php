<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;
use stdClass;

/**
 * Repository class for interacting with user data.
 */
class UserRepository
{
    /**
     * User model instance.
     *
     * @var User
     */
    protected User $model;

    /**
     * Constructor for the UserRepository class.
     *
     * @param  User  $model The User model instance.
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Find a user by ID.
     *
     * @param  int|string  $id The ID of the user to find.
     * @return stdClass|null The object of the found user or null if not found.
     */
    public function findOne(int|string $id): stdClass|null
    {
        return $this->model->find($id);
    }
}
