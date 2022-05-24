<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items=Inventory::where('user_id'==Auth::user()->id)->get();

        $items=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id'==Auth::user()->id)->select('products.*')->get();

        return view('inventory', compact('items'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $products)
    {

            foreach($products as $product){
                Inventory::create(['user_id'=>Auth::user()->id,'product_id',$product['id']]);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Product::where('id',$id)->get();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $categ=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id'==Auth::user()->id)->where('product_id',$product['id'])->select('products.category')->get();

        $invproducts= DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('category',$categ)->select('products.id')->get();

        Inventory::where('user_id'==Auth::user()->id)->whereIn('product_id',$invproducts)->update(['equipped'=>false]);

        Inventory::where('user_id'==Auth::user()->id)->where('product_id',$product['id'])->update(['equipped'=>true]);

        if ($categ=='avatar'){
            $user = User::where(['id'=>Auth::user()->id]);
            $user->updateAvatar($product['id']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
