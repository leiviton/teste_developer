<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SecretFriendParticipant extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'secret_friend_id',
        'participant_id'
    ];

    public function secretFriend()
    {
        return $this->belongsTo(SecretFriend::class,'secret_friend_id','id');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class,'participant_id','id');
    }
}
