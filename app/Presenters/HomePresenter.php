<?php

namespace App\Presenters;

use App\Transformers\HomeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HomePresenter.
 *
 * @package namespace App\Presenters;
 */
class HomePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HomeTransformer();
    }
}
