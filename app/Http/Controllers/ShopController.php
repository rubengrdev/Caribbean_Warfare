<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){
        $products=Product::where('available', 1)-> orderBy("created_at","desc") ->get();
        return $products;


    }
}
