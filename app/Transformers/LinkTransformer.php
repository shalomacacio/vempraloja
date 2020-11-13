<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Link;

/**
 * Class LinkTransformer.
 *
 * @package namespace App\Transformers;
 */
class LinkTransformer extends TransformerAbstract
{
    /**
     * Transform the Link entity.
     *
     * @param \App\Entities\Link $model
     *
     * @return array
     */
    public function transform(Link $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
