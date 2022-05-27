<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Shoppingcart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\New_;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $cart=session()->get('product.id');
        return view('home', compact('cart'));
        */
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

        $cart = session()->get('cart', []);
        $cart[] = intval($request->id);
        // $_SESSION["cart"] = [];
        // $_SESSION["cart"] += [intval($request->id)];
        // $cart->push('cart', intval($request->id));
        $request->session()->push('cart.id', $cart);

        dd($request->session()->all());
        // dd($_SESSION["shoppingCart"]);
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart=session()->get('product.id',$id);

        return $cart;
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
    public function destroy($id)
    {
        session()->forget('product.id');

    }

    public function removeproduct($id)
    {
        session()->forget('product.id',$id);
    }

}
