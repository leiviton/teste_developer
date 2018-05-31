<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Room;

class RoomTransformer extends TransformerAbstract
{
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Room $model
     *
     * @return array
     */
    public function transform(Room $model)
    {
        return [
            'id'         => (int) $model->id,
            'name' => (string) $model->title,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
