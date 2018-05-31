<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Seat extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'row',
        'row_size'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
