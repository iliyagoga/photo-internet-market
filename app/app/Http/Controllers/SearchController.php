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
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use ValidatesRequests;
    public function getSearchProducts(Request $request){
        $this->validate(request(), [
            'model'=>['required']
        ]);
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
                    foreach(Product::whereLike('model',$request->model.'%')->skip(9*($request->page-1))->take(9)->get() as $product){
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
                return view('searchPage',[
                    'catalog'=>$productsFind,
                    "count"=>count($productsFind),
                    'request'=>request(),
                    'pagin_len'=>ceil(count($productsFind)/9)
                    
            ]);
            }   
            session(['page'=>$request->page]);
            return view('searchPage',[
                'catalog'=>Product::whereLike('model','%'+$request->model)->orderBy($price?'price_wkday':'id',$price?$price:'ASC')->skip(9*($request->page-1))->take(9)->get(),
                "count"=>Product::whereLike('model','%'+$request->model)->skip(9*($request->page-1))->take(9)->count(),
                'request'=>request(),
                'pagin_len'=>ceil(Product::skip(9*($request->page-1))->take(9)->count()/9)
                    
                
        ]);
        }
    }
}