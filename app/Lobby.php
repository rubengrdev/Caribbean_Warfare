<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
    protected $fillable=['user_id1', 'user_id2', 'connections'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
