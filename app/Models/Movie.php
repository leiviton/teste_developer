<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Movie extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'director',
        'poster',
        'placa',
        'year_released',
        'synopsis'
    ];
}
