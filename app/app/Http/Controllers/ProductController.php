<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Tag;
use Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){}

    public function getProduct(Request $request){
        return view("product",[
            "product"=>Product::find( $request->id ),
            "attributes"=>(Product::find($request->id)->attributesValue()->get()),
            "tags"=>Tag::where("product_id",'=',$request->id )->get(),
            "company"=>Company::where("product_id",'=',$request->id )->first()]);
    }

    public function getProductsByCategory(Request $request){
        if(count(Category::where('name','=',$request->category)->first()->product()->get())>0){
            if(!empty(request()->all())){
                $arr= [];
                foreach(request()->all() as $key=>$value){
                    array_push($arr,str($value));
                }
                $attrValuesIds=[];
                foreach(AttributesValues::whereIn('value',$arr)->get() as $elem){
                    array_push($attrValuesIds,$elem['product_id']);
                }
                return view('categories',[
                    'catalog'=>Category::where('name','=',$request->category)->first()->product()->whereOr('id','=',$attrValuesIds)->get(),
                    'categories'=>Category::get(),
                    "cValue"=>Category::where("name","=",$request->category)->first(),
                    "count"=>Category::where('name','=',$request->category)->first()->product()->whereOr('id','=',$attrValuesIds)->get()->count(),
                    'attributes'=>Attributes::all()->attributesValue()->whereRelation('products',)
                    
            ]);
            }
            $idsProduct=[];
            foreach(Category::where('name','=',$request->category)->first()->product()->get() as $product){
                array_push($product->id);
            }
            print_r(count($idsProduct));
            return view('categories',[
                'catalog'=>Category::where('name','=',$request->category)->first()->product()->get(),
                'categories'=>Category::get(),
                "cValue"=>Category::where("name","=",$request->category)->first(),
                "count"=>Category::where('name','=',$request->category)->first()->product()->count(),
                'attributes'=>Attributes::all()->attributesValue()->whereRelation('products',)
                
        ]);
        }
     }
}
