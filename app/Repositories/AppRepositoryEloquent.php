<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AppRepository;
use App\Entities\App;
use App\Validators\AppValidator;
use App\Models\Crumb;

/**
 * Class AppRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AppRepositoryEloquent extends BaseRepository implements AppRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return App::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCrumbNameById($id)
    {
        $crumb = Crumb::find($id);
        return $crumb->name;
    }

    public function getCrumbById($id)
    {
        $crumb = Crumb::find($id);
        return $crumb;
    }


}
