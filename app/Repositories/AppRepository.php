<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AppRepository.
 *
 * @package namespace App\Repositories;
 */
interface AppRepository extends RepositoryInterface
{
    //
    public function getCrumbNameById($id);
    public function getCrumbById($id);
}
