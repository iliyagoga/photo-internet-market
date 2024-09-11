<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Category;
use App\Models\Company;
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
            "tags"=>Tag::where("product_id",'=',$request->id )->get(),
            "company"=>Company::where("product_id",'=',$request->id )->first()]);
    }

    public function getProductsByCategory(Request $request){
        if(!empty(Category::where("name",'=',$request->category)->get())){
            return view('categories',[
                'catalog'=>Category::where('name','=',$request->category)->first()->product()->get(),
                'categories'=>Category::get(),
                "cValue"=>Category::where("name","=",$request->category)->first(),
                "count"=>Category::where('name','=',$request->category)->first()->product()->count()
        ]);
        }
     }
}
