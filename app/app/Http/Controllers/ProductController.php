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
            $attrs=[];
            foreach(Category::where('name','=',$request->category)->get()[0]->product()->get() as $product){
                foreach($product->attributesValue()->get() as $at){
                    
                    if(isset($attrs[$at->attributes->id])){
                        $c=0;
                        foreach($attrs[$at->attributes->id]['values'] as $k=>$v){
                            if($v[1]==$at->id){
                                $c++;
                            }
                        }
                        if($c==0){
                            array_push($attrs[$at->attributes->id]['values'], [
                                $at->value,
                                $at->id
                            ]);
                        }
                     
                    }else{
                        $attrs[$at->attributes->id]=
                        [
                            'value'=> $at->attributes->value,
                            'values'=>[
                            [$at->value,
                            $at->id
                            ]]
                        ];
                    }    
                }
                
            }
            if(!empty(request()->all())){
                $arr= [];
                foreach(request()->all() as $key=>$value){
                    session([$value=>'y']);
                    array_push($arr,$value);
                }
                $productsFind=[];
                $productsIds=[];
                foreach($arr as $key=>$value){
                    foreach(AttributesValues::find($value)->products()->get() as $product){
                        if(!in_array($product->id,$productsIds)){
                            array_push($productsFind,$product);
                            array_push($productsIds,$product->id);
                        }
                     
                     
                    }
                 
                }
                return view('categories',[
                    'catalog'=>$productsFind,
                    'categories'=>Category::get(),
                    "cValue"=>Category::where("name","=",$request->category)->first(),
                    "count"=>count($productsFind),
                    'attributes'=>$attrs,
                    'request'=>request()
                    
            ]);
            }
            request()->session()->flush();
            return view('categories',[
                'catalog'=>Category::where('name','=',$request->category)->first()->product()->get(),
                'categories'=>Category::get(),
                "cValue"=>Category::where("name","=",$request->category)->first(),
                "count"=>Category::where('name','=',$request->category)->first()->product()->count(),
                'attributes'=>$attrs,
                'request'=>request()
                    
                
        ]);
        }
     }
}
