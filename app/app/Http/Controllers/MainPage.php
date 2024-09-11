<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class MainPage extends Controller
{
    public function index(){
        return view('meanPage',['news'=>News::take(5)->get()]);
    }
}
