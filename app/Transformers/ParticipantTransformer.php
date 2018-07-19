<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Participant;

class ParticipantTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['user'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Participant $model
     *
     * @return array
     */
    public function transform(Participant $model)
    {
        return [
            'id'         => (int) $model->id,
            'name' => (string) $model->name,
            'genre' => (string) $model->genre,
            'age' => (string) $model->age,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeUser(Participant $model)
    {
        return $this->item($model->user, new UserTransformer());
    }
}
