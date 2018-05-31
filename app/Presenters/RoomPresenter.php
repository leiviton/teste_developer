<?php

namespace TestDeveloper\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use TestDeveloper\Transformers\RoomTransformer;

class RoomPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoomTransformer();
    }
}
