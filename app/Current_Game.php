<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Current_Game extends Model
{
    protected $fillable=['user_id1', 'user_id2', 'user1_boats', 'user2_boats', 'user1_shots', 'user2_shots'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
