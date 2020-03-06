<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Home;

/**
 * Class HomeTransformer.
 *
 * @package namespace App\Transformers;
 */
class HomeTransformer extends TransformerAbstract
{
    /**
     * Transform the Home entity.
     *
     * @param \App\Entities\Home $model
     *
     * @return array
     */
    public function transform(Home $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
