<?php

namespace App\Http\Controllers;
use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Category;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(\App\Http\Middleware\Admin::class);
    }


    public function showPanel(Request $request){
        if($request->id==1){
            return view('admin.products',[
            'info'=>Product::get()]);
        }
        if($request->id==2){
            return view('admin.categories',[
            'info'=>Category::get()]);
            }
        if($request->id==3){
            return view('admin.attributes',[
            'info'=>Attributes::get()]);
        }
        if($request->id==4){
            return view('admin.orders',[
            'info'=>Order::orderBy('id','desc')->get()]);
        }
        if($request->id==5){
            return view('admin.users',[
            'info'=>User::get()]);
        }
        return view('admin.panel');
        
    }

    public function showProduct(Request $request){
        return view('admin.product',[
            'product'=>Product::find($request->id),
            'categories'=>Category::get(),
            "attributes"=>(Product::find($request->id)->attributesValue()->get()),
            "companies"=>Company::get(),
            "tags"=>Tag::where("product_id",'=',$request->id )->get(),
            "company"=>Company::where("product_id",'=',$request->id )->first(),
            'allAttributes'=>Attributes::get()]);
    }

    public function redProduct(Request $request){
        $product=Product::find($request->id);
        $product->model=$request->model;
        $product->text=$request->text;
        $product->price_wkday=$request->price_wkday;
        $product->price_wend=$request->price_wend;
        $product->price_week=$request->price_week;
        $product->price_month=$request->price_month;
        foreach($request->all() as $key=>$value){
            if(preg_match("/^attr-[0-9]+-attrValDef/",$key)){
                if($value!='null'){
                    $attrValue= AttributesValues::find((int) explode('-',$value)[1]);
                    $attrValue->products()->syncWithoutDetaching([$request->id]);
                    $attrValue->save();
                }else{
                    if(!empty(explode('-',$key)[3])){
                        $attrValue= AttributesValues::find(explode('-',$key)[3]);
                        $attrValue->products()->detach($request->id);
                    }
                   
                }
            }
            if(preg_match("/^tag-/",$key)){
                if($value){
                    $tag= Tag::find(explode('-',$key)[1]);
                    $tag->value=$value;
                    $tag->save();
                }
                else{
                    $tag= Tag::find(explode('-',$key)[1]);
                    $tag->delete();
                }
                
            }
           
         
        }
        if($request->category){
            $product->category()->syncWithoutDetaching([$request->category]);
        }
        if($request->company){
            $company=$product->company()->first();
            $company->name=$request->company;
            $company->save();
        }
        if($request->stock=='on'){
            $product->stock='true'; 
        }else{
            $product->stock='false';
        }
        
        $image = $request->file('img');
        if ($image) {
            $path = $image->store('', 'public');
            $base = basename($path);
            $product->mean_image=$base;
        }
        if($request->new){
            $tag2= new Tag(['value'=>$request->new]);
            $tag2->product()->associate($product);
            $tag2->save();
        }
        $product->save();
        return back();

    }

    public function addShowProduct(){
       return view('admin.addProduct',[
        'allAttributes'=>Attributes::get()
       ]);

    }

    public function addProduct(Request $request){
        $image = $request->file('img');
        $base='';
        if ($image) {
            $path = $image->store('', 'public');
            $base = basename($path);
        }
        $product=Product::create([
            'model'=>$request->model,
            'text'=>$request->text,
            'price_wkday'=>$request->price_wkday,
            'price_wend'=>$request->price_wend,
            'price_week'=>$request->price_week,
            'price_month'=>$request->price_month,
            'stock'=>'false',
            'mean_image'=>$base


        ]);
        $product->save();
        foreach($request->all() as $key=>$value){
            if(preg_match("/^attr-[0-9]+-attrValDef/",$key)){
                if($value!='null'){
                    $attrValue= AttributesValues::find((int) explode('-',$value)[1]);
                    $attrValue->products()->syncWithoutDetaching([$request->id]);
                    $attrValue->save();
                }else{
                    if(!empty(explode('-',$key)[3])){
                        $attrValue= AttributesValues::find(explode('-',$key)[3]);
                        $attrValue->products()->detach($request->id);
                    }
                   
                }
            }
            if(preg_match("/^tag-/",$key)){
                if($value){
                    $tag= Tag::find(explode('-',$key)[1]);
                    $tag->value=$value;
                    $tag->save();
                }
                else{
                    $tag= Tag::find(explode('-',$key)[1]);
                    $tag->delete();
                }
                
            }
           
         
        }
        if($request->category){
            $product->category()->syncWithoutDetaching([$request->category]);
        }
        if($request->company){
            $company= new Company(['name'=>$request->company]);
            $company->product()->associate($product);
            $company->save();
        }
        else{
            $company= new Company(['name'=>"Canon"]);
            $company->product()->associate($product);
            $company->save();
        }

        if($request->new){
            $tag2= new Tag(['value'=>$request->new]);
            $tag2->product()->associate($product);
            $tag2->save();
        }
        return redirect()->route('product_panel');
    }
    

    public function redCategory(Request $request){
       $cat= Category::find($request->id);
       $cat->value=$request->value;
       $cat->name=$request->name;
       $cat->save();
       return back();
    }

    public function delCategory(Request $request){
        $cat =Category::find($request->id);
        $cat->delete();
        return back();
    }

    public function addCategory(Request $request){
        Category::create(['name'=>$request->name,'value'=>$request->value]);
        return back();
    }

    public function redAttr(Request $request){
        $attrID=0;
        foreach($request->all() as $k=>$v){
            if(preg_match('/^at-[0-9]+$/',$k)){
                $attrID=explode('-',$k)[1];
                $attribute=Attributes::find($attrID);
                if($v){
                    $attribute->value=$v;
                    $attribute->save();
                }else{
                    $attrVals=$attribute->attributesValue()->get();
                    foreach($attrVals as $attrVal){
                        $attrVal->products()->detach();
                        $attrVal->delete();
                    }
                    $attribute->delete();
                    return back();

                }
              
            }
        };
        foreach($request->all() as $k=>$v){
            if(preg_match('/^atv-[0-9]+$/',$k)){
                $attrValID=explode('-',$k)[1];
                $attributeVal=AttributesValues::find($attrValID);
                if($v){
                    $attributeVal->value=$v;
                    $attributeVal->save();
                }
                else{
                    $attributeVal->delete();
                }
               
            }
        };
        if($request->new){
            $attribute=Attributes::find($attrID);
            $attrValCreate=new AttributesValues(['value'=>$request->new]);
            $attrValCreate->attributes()->associate($attribute);
            $attrValCreate->save();
        }
        return back();
       
    }

    public function addAttr(Request $request){
        if($request->attrName){
            $attr= Attributes::create(['value'=>$request->attrName]);
            if($request->new){
                $attrVal=new AttributesValues(['value'=>$request->new]);
                $attr->save();
                $attrVal->attributes()->associate($attr);
                $attrVal->save();
            }
            else{
                $attr->save();
            }

        }
        return back();
    }

    public function showOrder(Request $request){
        return view('admin.order',[
            'order'=>Order::find($request->id)
        ]);
    }

    public function showUser(Request $request){
        return view('admin.user',[
            'user'=>User::find($request->id)
        ]);
    }

       
    
}