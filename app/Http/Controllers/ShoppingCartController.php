<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=session()->get('cart', 'default');
        $products = [];

        if ($cart > 0) {
            foreach ($cart as $cart => $id) {
                $products[] = Product::where('id', $id)->first();
            }
        }

        return view('shop.cart', compact('products'));
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
        $request->session()->push('cart', intval($request->id));
        // dd($request->session()->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        /*
        $cart=session()->get('cart', $product->id);
        dd($cart);

        return $cart;
        */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $products = session()->get('cart');

        // esto mira dentro del array de productos si hay alguno con la id del producto a eliminar
        if (($key = array_search($id, $products)) !== false) {
            unset($products[$key]);
        }
        $request->session()->put('cart', $products);
        // dd($request->session()->all());

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('cart');

        return back();
    }

}
