<?php

namespace TestDeveloper\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use TestDeveloper\Transformers\BookingTransformer;

class BookingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BookingTransformer();
    }
}
