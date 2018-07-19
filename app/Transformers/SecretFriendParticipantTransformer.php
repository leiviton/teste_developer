<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\SecretFriendParticipant;

class SecretFriendParticipantTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['participant'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Room $model
     *
     * @return array
     */
    public function transform(SecretFriendParticipant $model)
    {
        return [
            'id'         => (int) $model->id,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeParticipant(SecretFriendParticipant $model)
    {
        return $this->item($model->participant, new ParticipantTransformer());
    }
}
