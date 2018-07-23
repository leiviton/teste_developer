<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SecretFriend extends Model implements Transformable
{
    use TransformableTrait;

    protected  $table = 'secret_friends';

    protected $fillable = [
        'title',
        'realization_date',
        'minimum_value',
        'user_id'
    ];

    public function participants()
    {
        return $this->hasMany(SecretFriendParticipant::class);
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
