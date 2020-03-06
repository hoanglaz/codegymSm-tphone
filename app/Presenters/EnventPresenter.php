<?php

namespace App\Presenters;

use App\Transformers\EnventTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EnventPresenter.
 *
 * @package namespace App\Presenters;
 */
class EnventPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EnventTransformer();
    }
}
