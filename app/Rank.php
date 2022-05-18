<?php

namespace App;
use App\Score;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable=['rank', 'points'];

    public function score(){
        return $this->belongsTo(Score::class);
    }
}
