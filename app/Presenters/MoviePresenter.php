<?php

namespace TestDeveloper\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use TestDeveloper\Transformers\MovieTransformer;

class MoviePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MovieTransformer();
    }
}
