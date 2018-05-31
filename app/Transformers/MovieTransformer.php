<?php

namespace TestDeveloper\Transformers;

use League\Fractal\TransformerAbstract;
use TestDeveloper\Models\Movie;

class MovieTransformer extends TransformerAbstract
{
    /**
     * Transform the Driver entity
     * @param TestDeveloper\Models\Movie $model
     *
     * @return array
     */
    public function transform(Movie $model)
    {
        return [
            'id'         => (int) $model->id,
            'title' => (string) $model->title,
            'director' => (string) $model->director,
            'poster' => (string) $model->poster,
            'year_released' => (string) $model->year_realeased,
            'synopsis' => (string) $model->synopsis,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
