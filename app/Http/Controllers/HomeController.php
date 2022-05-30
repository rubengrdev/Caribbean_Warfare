<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('category','avatar')->where('equipped',1)->select('products.*', 'inventories.*')->get();
        $coconut=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('category','consumable')->where('equipped',1)->select('products.*', 'inventories.*')->get();
        //dd($items);
        //dd($coconut);
        return view('home',compact('items','coconut'));
    }
}
