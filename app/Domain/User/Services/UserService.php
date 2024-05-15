<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;
use stdClass;

/**
 * Service class for operations related to users.
 */
class UserService
{
    protected $userRepository;

    /**
     * Constructor for the UserService class.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Find a user by ID.
     *
     * @param  int|string  $id The ID of the user to find.
     * @return stdClass|null The object of the found user or null if not found.
     */
    public function findOne(int|string $id): stdClass|null
    {
        // Data validation and business logic here

        return $this->userRepository->findOne($id);
    }
}
