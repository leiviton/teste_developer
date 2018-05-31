<?php

namespace TestDeveloper\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use TestDeveloper\Transformers\SessionTransformer;

class SessionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SessionTransformer();
    }
}
