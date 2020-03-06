<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Envent;

/**
 * Class EnventTransformer.
 *
 * @package namespace App\Transformers;
 */
class EnventTransformer extends TransformerAbstract
{
    /**
     * Transform the Envent entity.
     *
     * @param \App\Entities\Envent $model
     *
     * @return array
     */
    public function transform(Envent $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
