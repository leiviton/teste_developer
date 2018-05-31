<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Booking extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'ticket_number',
        'seat'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
