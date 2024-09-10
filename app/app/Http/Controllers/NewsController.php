<?php

namespace App\Http\Controllers;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news',['news'=>News::get()]);
    }
}
