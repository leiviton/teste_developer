<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SecretFriendParticipant extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'secret_friend_participants';
    protected $fillable = [
        'secret_friend_id',
        'participant_id'
    ];

    public function secretFriend()
    {
        return $this->belongsTo(SecretFriend::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
