<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\SecretFriend;

class SecretFriendTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['participants'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\SecretFriend $model
     *
     * @return array
     */
    public function transform(SecretFriend $model)
    {
        return [
            'id'         => (int) $model->id,
            'title' => (string) $model->title,
            'realization_date' => $model->realization_date,
            'minimum_value' => $model->minimum_value,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeParticipants(SecretFriend $model)
    {
        return $this->collection($model->participants, new SecretFriendParticipantTransformer());
    }
}
