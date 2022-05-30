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
    public function store(Request $request)
    {
        $item=json_decode($request->product);
        //dd($item->id);

        if (((Inventory::where('user_id',Auth::user()->id)->where('product_id',$item->id)->value('product_id')) != null && Inventory::where('user_id',Auth::user()->id)->where('product_id',$item->id)->value('product_id') != 2)){

        }else if (((Inventory::where('user_id',Auth::user()->id)->where('product_id',$item->id)->value('product_id')) == 2)){
            Inventory::where('user_id',Auth::user()->id)->where('product_id',$item->id)->update(['amount'=>DB::raw('amount+1')]);

        }else if((Inventory::where('user_id',Auth::user()->id)->where('product_id',$item->id)->value('product_id')) == null){
            Inventory::create(['user_id'=>Auth::user()->id,'product_id'=>$item->id,'amount'=>1,'equipped'=>0]);

        }

        $products=Product::where('available', 1)->where('id','>',1)-> orderBy("created_at","desc")->get();
        if($products != null && $products != '[]'){
            return view('shop.index', compact('products'));
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
            //dd($request);
            $updateAv->updateAvatar($request);


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

    public function saveFromCart(){

        $cart=session()->get('cart.id', 'default');
        $amounts=session()->get('cart.amounts', 'default');
        $products=[];
        if ($cart > 0) {
            foreach ($cart as $cart => $id) {
                $products[] = Product::where('id', $id)->first();
            }
        }
        //dd($products[0]->id);
        for($i=0;$i<count($products);$i++){
            if ((Inventory::where('user_id',Auth::user()->id)->where('product_id',$products[$i]->id)->value('product_id')) != null && Inventory::where('user_id',Auth::user()->id)->where('product_id',$products[$i]->id)->value('product_id') != 2){
                session()->forget('cart.id');
                session()->forget('cart.amounts');
            }else if (((Inventory::where('user_id',Auth::user()->id)->where('product_id',$products[$i]->id)->value('product_id')) == 2)){
                Inventory::where('user_id',Auth::user()->id)->where('product_id',$products[$i]->id)->increment('amount',$amounts[$i]);
                session()->forget('cart.id');
                session()->forget('cart.amounts');
            }else if((Inventory::where('user_id',Auth::user()->id)->where('product_id',$products[$i]->id)->value('product_id')) == null){
                Inventory::create(['user_id'=>Auth::user()->id,'product_id'=>$products[$i]->id,'amount'=>1,'equipped'=>0]);
                session()->forget('cart.id');
                session()->forget('cart.amounts');
            }
        }

        // $prodCont=new ProductController;
        // $prodCont->index();
        // $prodList=$prodCont->all();
        // dd($prodCont->all());
        // return view('shop.index',compact('prodList'));

        $products=Product::where('available', 1)->where('id','>',1)-> orderBy("created_at","desc")->get();
        if($products != null && $products != '[]'){
            return view('shop.index', compact('products'));

        }




    }
}
