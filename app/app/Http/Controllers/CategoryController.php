<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function showCategoryList(){
        return view("categoriesList",['categories'=>Category::all()]);
    }
}