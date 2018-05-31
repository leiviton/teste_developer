<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Vehicle;

/**
 * Class VehicleTransformer
 * @package namespace Pedidos\Transformers;
 */
class VehicleTransformer extends TransformerAbstract
{

    /**
     * Transform the Vehicle entity
     * @param TestDeveloper\Models\Vehicle $model
     *
     * @return array
     */
    public function transform(Vehicle $model)
    {
        return [
            'id'         => (int) $model->id,
            'chassi' => (string) $model->chassi,
            'renavam' => (string) $model->renavam,
            'marca' => (string) $model->marca,
            'modelo' => (string) $model->modelo,
            'placa' => (string) $model->placa,
            'cor' => (string) $model->cor,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
