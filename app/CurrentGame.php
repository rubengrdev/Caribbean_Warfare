<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentGame extends Model
{
    protected $fillable=['user_id1', 'user_id2', 'user1_boats', 'user2_boats', 'user1_shots', 'user2_shots', 'status'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
