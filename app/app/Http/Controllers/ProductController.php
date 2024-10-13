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
        $price=null;
        if(!empty($request->price)){
            if ($request->price==1){
                session(['price'=>'ASC']);
                $price='ASC';
            }
            if ($request->price== 2){
                session(['price'=>'DESC']);
                $price= 'DESC';
            }

        }elseif((session())->exists('price')){
            $price=session('price');
        }
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
            if(count(request()->all())>0){
                foreach(session()->all() as $k=>$v){
                    if($k!='_token'){
                        session()->remove($k);
                    }
       
                }
            }
            $c=false;
            foreach(session()->all() as $k=>$v){
                if($v=='y'){
                    $c=true;
                    break;
                }
            }
            if(count(request()->all())>0 || $c ){
                $arr= [];
                if(count(request()->all())>0 && $c==false){
                  
                    foreach(request()->all() as $key=>$value){
                        session([$value=>'y']);
                        array_push($arr,$value);
                    }
                }
                if(count(request()->all())==0){
                    foreach(session()->all() as $k=>$v){
                        if($v=='y'){
                            array_push($arr,$k);
                        }
                    }
                }
                $productsFind=[];
                $productsIds=[];
                foreach($arr as $key=>$value){
                    foreach(AttributesValues::find($value)->products()->skip(9*($request->page-1))->take(9)->get() as $product){
                        if(!in_array($product->id,$productsIds)){
                            array_push($productsFind,$product);
                            array_push($productsIds,$product->id);
                        }
                     
                     
                    }
                }
                if($price=='ASC'){
                    usort($productsFind,function($a,$b){
                        return $a->price_wkday>$b->price_wkday;
                    });
                }
                if($price=='DESC'){
                    usort($productsFind,function($a,$b){
                        return $a->price_wkday<$b->price_wkday;
                    });
                }
                return view('categories',[
                    'catalog'=>$productsFind,
                    'categories'=>Category::get(),
                    "cValue"=>Category::where("name","=",$request->category)->first(),
                    "count"=>count($productsFind),
                    'attributes'=>$attrs,
                    'request'=>request(),
                    'pagin_len'=>ceil(count($productsFind)/9)
                    
            ]);
            }   
            session(['page'=>$request->page]);
            return view('categories',[
                'catalog'=>Category::where('name','=',$request->category)->first()->product()->orderBy($price?'price_wkday':'id',$price?$price:'ASC')->skip(9*($request->page-1))->take(9)->get(),
                'categories'=>Category::get(),
                "cValue"=>Category::where("name","=",$request->category)->first(),
                "count"=>Category::where('name','=',$request->category)->first()->product->skip(9*($request->page-1))->take(9)->count(),
                'attributes'=>$attrs,
                'request'=>request(),
                'pagin_len'=>ceil(Category::where('name','=',$request->category)->first()->product->skip(9*($request->page-1))->take(9)->count()/9)
                    
                
        ]);
        }
    }
    public function clearSession(Request $request){
        $url=(explode('/',session()->get('_previous')['url']));
        foreach(session()->all() as $k=>$v){
            if($v=='y'){
                session()->remove($k);
            }

        }
        return redirect(url('catalog/'.$url[4].'/1'));
     
     }

     public function clearSession2(Request $request){
        $url=(explode('/',session()->get('_previous')['url']));
        foreach(session()->all() as $k=>$v){
            if($v=='y'){
                session()->remove($k);
            }

        }
        return redirect(url('c/'.$url[4].'/1'));
     
     }

     public function getProducts(Request $request){
        $price=null;
        if(!empty($request->price)){
            if ($request->price==1){
                session(['price'=>'ASC']);
                $price='ASC';
            }
            if ($request->price== 2){
                session(['price'=>'DESC']);
                $price= 'DESC';
            }

        }elseif((session())->exists('price')){
            $price=session('price');
        }
        if(count(Product::get())>0){
            $attrs=[];
            foreach(Product::get() as $product){
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
            if(count(request()->all())>0){
                foreach(session()->all() as $k=>$v){
                    if($k!='_token'){
                        dd($k.' '.$v);
                        session()->remove($k);
                    }
       
                }
            }
            $c=false;
            foreach(session()->all() as $k=>$v){
                if($v=='y'){
                    $c=true;
                    break;
                }
            }
            if(count(request()->all())>0 || $c ){
                $arr= [];
                if(count(request()->all())>0 && $c==false){
                  
                    foreach(request()->all() as $key=>$value){
                        session([$value=>'y']);
                        array_push($arr,$value);
                    }
                }
                if(count(request()->all())==0){
                    foreach(session()->all() as $k=>$v){
                        if($v=='y'){
                            array_push($arr,$k);
                        }
                    }
                }
                $productsFind=[];
                $productsIds=[];
                foreach($arr as $key=>$value){
                    foreach(AttributesValues::find($value)->products()->skip(9*($request->page-1))->take(9)->get() as $product){
                        if(!in_array($product->id,$productsIds)){
                            array_push($productsFind,$product);
                            array_push($productsIds,$product->id);
                        }
                     
                     
                    }
                }
                if($price=='ASC'){
                    usort($productsFind,function($a,$b){
                        return $a->price_wkday>$b->price_wkday;
                    });
                }
                if($price=='DESC'){
                    usort($productsFind,function($a,$b){
                        return $a->price_wkday<$b->price_wkday;
                    });
                }
                return view('catalog',[
                    'catalog'=>$productsFind,
                    "count"=>count($productsFind),
                    'attributes'=>$attrs,
                    'request'=>request(),
                    'pagin_len'=>ceil(count($productsFind)/9)
                    
            ]);
            }   
            session(['page'=>$request->page]);
            return view('catalog',[
                'catalog'=>Product::orderBy($price?'price_wkday':'id',$price?$price:'ASC')->skip(9*($request->page-1))->take(9)->get(),
                "count"=>Product::skip(9*($request->page-1))->take(9)->count(),
                'attributes'=>$attrs,
                'request'=>request(),
                'pagin_len'=>ceil(Product::skip(9*($request->page-1))->take(9)->count()/9)
                    
                
        ]);
        }
    }
}
