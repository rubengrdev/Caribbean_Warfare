<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name', 'description', 'price', 'discount', 'category', 'stock', 'available', 'image'];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('amount', 'buy_date');
    }
}
