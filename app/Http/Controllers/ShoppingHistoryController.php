<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShoppingHistoryController extends Controller
{
    public function index()
    {
        $history=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->take(10)->orderBy('created_at','desc')->select('products.name','products.price','products.category','products.image','inventories.amount', 'inventories.created_at')->get();

        return view('shop.history', compact('history'));
    }
}
