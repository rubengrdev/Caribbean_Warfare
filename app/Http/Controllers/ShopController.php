<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){
        $products=Product::where('available', 1)->get();
        $result = array();
        if ($products != null && $products != '[]'){

            for ($i=0;$i<count($products);$i++){
                $response = response()->json('{"name":"'.$products[$i]['name'].'","description":"'.$products[$i]['description'].'","price":'.$products[$i]['price'].',"image":"'.$products[$i]['image'].'","discount":'.$products[$i]['discount'].'}');

                /*$array=json_decode($response);
                $data=$array->original[0];

                $newresponse=array();
                $newresponse['data']=$data;
                $newresponse['errors']=[];
                $newresponse['success']=true;
                $newresponse['status_code']=200;

                $newresponse=json_encode($newresponse);*/
                $result[]=$response;
            }


            return $result;
            //return view('shop.show')->with('response',$response);
        }

        /*$products = Product::where('available', 1)->get();
        if($products != null && $products != '[]'){
            return response()->json([
                'message' => $products[1]['name']

            ]);

        }else{
            return response()->json("{
                'message' => 'error not found',
                'status' => false,
                'code' => 404
            }");

        }*/
    }
}
