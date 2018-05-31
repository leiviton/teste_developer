<?php

namespace TestDeveloper\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use TestDeveloper\Transformers\SeatTransformer;

class SeatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SeatTransformer();
    }
}
