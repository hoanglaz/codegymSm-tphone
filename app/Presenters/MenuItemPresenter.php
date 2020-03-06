<?php

namespace App\Presenters;

use App\Transformers\MenuItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuItemPresenter.
 *
 * @package namespace App\Presenters;
 */
class MenuItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuItemTransformer();
    }
}
