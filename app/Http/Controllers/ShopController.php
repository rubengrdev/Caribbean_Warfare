<?php

namespace App\Http\Controllers;
use App\Product;
use App\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){
        $products=Product::where('available', 1)-> orderBy("created_at","desc") ->get();
        return view('shop.index')->with('products');

    }

    public function search($data){
        $result= Product::where([['name','LIKE','%'.$data.'%'],['category','LIKE','%'.$data.'%']])->where('available',1);
        return $result;
    }

    public function additem($arrayprod){
        foreach($arrayprod as $product){
            Inventory::create(['user_id'=>Auth::user()->id,'product_id',$product['id']]);
        }
        //return view('shop');
    }

}
