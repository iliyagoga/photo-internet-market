<?php

namespace App\Http\Controllers;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(\App\Http\Middleware\Admin::class);
    }


    public function showPanel(Request $request){
        if($request->id==1){
                return view('admin.products',[
                    'type'=> 'products',
                'info'=>Product::get()]);
        }
        if($request->id==2){
            return view('admin.categories',[
                'type'=> 'category',
            'info'=>Category::get()]);
            }
        if($request->id==3){
            return view('admin.attributes',[
                'type'=> 'attributes',
            'info'=>Attributes::get()]);
        }
        return view('admin.panel');
        
    }

    public function showProduct(Request $request){
        return view('admin.product',[
            'product'=>Product::find($request->id),
            "attributes"=>(Product::find($request->id)->attributesValue()->get()),
            "tags"=>Tag::where("product_id",'=',$request->id )->get(),
            "company"=>Company::where("product_id",'=',$request->id )->first(),
            'allAttributes'=>Attributes::get()]);
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
       
    
}