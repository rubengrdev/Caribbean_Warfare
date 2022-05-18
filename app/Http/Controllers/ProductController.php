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
        }else{
            //no cuadra
            return response()->json("{
                'message' => '".$id." was not found',
                'status' => false,
                'code' => 404
            }");
        }
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
        return view('shop.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Solamente se puede modificar el atributo available de products, para que pueda aparecer o no en la tienda
        $old = Product::where('id', $id)->get();
        if(Product::where('id', $id)->update($request->all())){
            $new = Product::where('id', $id)->get();
            return response()->json("{
                'oldproduct' => $old,
                'newproduct' => $new,
                'status' => true,
                'code' => 200
            }");
        }else{
            return response()->json("{
                'message' => '".$id." was not found',
                'status' => false
            }");
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
