<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\Product;
use App\User;
use App\Http\Controllers\UserController;
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

        $items=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->select('products.*', 'inventories.*')->get();

        return view('inventory.index', compact('items'));


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
    public function update(Request $request)
    {

        //dd($request);
        //la id del producto al que quiere cambiar:
        //$request->id
        //hay que mirarse como pasar el objeto de tipo product, he intentado buscar por ID, pero no me deja, algo no va bien
        //a lo mejor es una tontería pero hay que echarle un ojo
        $product = Product::where("id", "=",intval($request->id))->get();

        $categ=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('product_id',$product[0]->id)->select('products.category')->get();

        //dd($categ[0]->category);
        //dd($categ);
        $invproducts= DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('category',$categ[0]->category)->select('products.id')->get();

        //dd($invproducts);
        //dd($invproducts[0]->id);

        DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('products.category',$categ[0]->category)->update(['equipped'=>false]);

        //$unequip=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('products.category',$categ[0]->category)->get();

        //dd($unequip);
        //dd($invproducts[0]->id);
        Inventory::where('user_id',Auth::user()->id)->where('product_id',intval($request->id))->update(['equipped'=>true]);






        if ($categ[0]->category=='avatar'){
            $user = User::where('id',Auth::user()->id);
            //dd($user);
            $updateAv= new UserController;
            $request->merge(['avatar_id' => intval($request->id)]);



        }
        return back();

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
