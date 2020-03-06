<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MenuItem;

/**
 * Class MenuItemTransformer.
 *
 * @package namespace App\Transformers;
 */
class MenuItemTransformer extends TransformerAbstract
{
    /**
     * Transform the MenuItem entity.
     *
     * @param \App\Entities\MenuItem $model
     *
     * @return array
     */
    public function transform(MenuItem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
