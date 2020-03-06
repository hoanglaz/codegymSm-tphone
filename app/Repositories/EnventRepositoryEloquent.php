<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EnventRepository;
use App\Entities\Envent;
use App\Validators\EnventValidator;

/**
 * Class EnventRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EnventRepositoryEloquent extends BaseRepository implements EnventRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Envent::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EnventValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
