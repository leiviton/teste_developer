<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Participant;
use TestDeveloper\Models\Wishlist;

class WishlistTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['participant'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Seat $model
     *
     * @return array
     */
    public function transform(Wishlist $model)
    {
        return [
            'id'         => (int) $model->id,
            'desire' => (string) $model->nome,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeParticipant(Wishlist $model)
    {
            return $this->item($model->participant, new ParticipantTransformer());
    }
}
