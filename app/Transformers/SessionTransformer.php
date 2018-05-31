<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Session;

class SessionTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['room'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Session $model
     *
     * @return array
     */
    public function transform(Session $model)
    {
        return [
            'id'         => (int) $model->id,
            'cinema' => (string) $model->cinema,
            'time_session' => (int) $model->time_session,
            'address' => (int) $model->address,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeRoom(Session $model)
    {
            return $this->item($model->room, new RoomTransformer());
    }

    public function includeMovie(Session $model)
    {
            return $this->item($model->movie, new MovieTransformer());
    }
}
