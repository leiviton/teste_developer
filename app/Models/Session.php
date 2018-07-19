<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Session extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'cinema',
        'time_session',
        'address'
    ];

    public function room()
    {
        return $this->belongsTo(SecretFriendParticipant::class);
    }

    public function movie()
    {
        return $this->belongsTo(Participant::class);
    }
}
