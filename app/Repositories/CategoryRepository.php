<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface
{
    public function model();
    public function validator();
    public function boot();
}
