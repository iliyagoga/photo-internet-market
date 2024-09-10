<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Product;
use App\Models\Tag;
use Attribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){}

    public function getProduct(Request $request){
        return view("product",[
            "product"=>Product::find( $request->id ),
            "attributes"=>(AttributesValues::where('product_id','=',$request->id)->get()),
            "tags"=>Tag::where("product_id",'=',$request->id )->get()]);
    }
}
