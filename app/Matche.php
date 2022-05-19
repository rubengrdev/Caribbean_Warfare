<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    protected $fillable = [
        'user_id1', 'user_id2', 'winner', 'points'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
