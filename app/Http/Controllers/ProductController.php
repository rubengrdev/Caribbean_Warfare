<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        if($products != null && $products != '[]'){
            return response()->json([
                'message' => $products,
                'status' => true,
                'code' => 200
            ]);
        }else{
            return response()->json("{
                'message' => 'error not found',
                'status' => false,
                'code' => 404
            }");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //nadie puede crear productos, ni el administrador, esta tarea queda excluida ya que por ahora
        //la lista de productos que se pueden adquirir es fija (catalogo)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //nadie puede crear productos, ni el administrador, esta tarea queda excluida ya que por ahora
        //la lista de productos que se pueden adquirir es fija (catalogo)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //conseguimos todos los datos de el producto referenciado
        $product = Product::where('id', $id)->get();
        //comprovamos que no esté vacio y solo nos devuelva unas llaves sin contenido
        if($product != '[]'){
            $response = response()->json("{
                'message' => $product,
                'status' => true,
                'code' => 200
            }");
            return view('shop.show')->with('response',$response);
        }

        //no cuadra
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Solamente se puede modificar el atributo available de products, para que pueda aparecer o no en la tienda
        $product = Product::where('id', $id)->get();
        if($product != '[]'){
            return view('shop.edit')->with('product', $product[0]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        dd($request);
        /***
         *  if($product != '[]'){
            //Solamente se puede modificar el atributo available de products, para que pueda aparecer o no en la tienda
            $validatedData = $request->validate([
                'available'=>'boolean'
            ]);
            if($product->update($validatedData)){
                return view('shop.show',['response' => true]);
            }
            return view('shop.show',['response' => false]);
        }
        return back();
        */
        //$product = Product::where('id', $id)->get();


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
