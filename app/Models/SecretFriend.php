<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SecretFriend extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'realization_date',
        'minimum_value'
    ];

    public function secretFriendParticipant()
    {
        return $this->hasMany(SecretFriendParticipant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
