<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\User;

/**
 * Class UserTransformer
 * @package namespace TestDeveloper\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'    => (int) $model->id,
            'name'  => $model->name,
            'email' => $model->email,
            'role'  => $model->role,
        ];
    }
}
