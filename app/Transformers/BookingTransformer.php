<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Booking;

class BookingTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['customer','session'];
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Booking $model
     *
     * @return array
     */
    public function transform(Booking $model)
    {
        return [
            'id'         => (int) $model->id,
            'ticket_number' => (string) $model->nome,
            'seat' => (int) $model->idade,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCustomer(Booking $model)
    {
            return $this->item($model->customer, new UserTransformer());
    }

    public function includeSession(Booking $model)
    {
            return $this->item($model->session, new SessionTransformer());
    }
}
