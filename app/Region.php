<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable=['region'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
