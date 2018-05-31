<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Seat;

class SeatTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['room'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Seat $model
     *
     * @return array
     */
    public function transform(Seat $model)
    {
        return [
            'id'         => (int) $model->id,
            'row' => (string) $model->nome,
            'row_size' => (int) $model->idade,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeRoom(Seat $model)
    {
            return $this->item($model->room, new RoomTransformer());
    }
}
