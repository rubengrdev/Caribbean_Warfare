<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $fillable=['user_id','product_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
