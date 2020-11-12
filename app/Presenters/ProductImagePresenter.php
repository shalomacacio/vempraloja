<?php

namespace App\Presenters;

use App\Transformers\ProductImageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductImagePresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductImagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductImageTransformer();
    }
}
