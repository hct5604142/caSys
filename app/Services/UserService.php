<?php

namespace App\Services;

class UserService
{
    private $userRepository;

    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser($id,$name,$password)
    {
        return $this->userRepository->createUser($id,$name,$password);
    }

}