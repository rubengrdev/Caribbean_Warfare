<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable=['id_user', 'score', 'date'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
