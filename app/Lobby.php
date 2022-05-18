<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
    protected $fillable=['id', 'connections', 'user_id1', 'user_id2', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
