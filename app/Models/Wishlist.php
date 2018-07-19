<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Wishlist extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'desire'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

}
