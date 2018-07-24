<?php

namespace TestDeveloper\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Participant extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'email',
        'genre',
        'age',
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
