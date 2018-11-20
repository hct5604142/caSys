<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    //
    public function findById($id);
    public function createUser($id,$name,$password);
    public function getUserList();
    public function saveUserName($id, $name);
}
