<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;
class NewsController extends Controller
{
    public function index()
    {
        return view('news/news',[
            'news'=>News::get()
        ]);
    }

    public function showNewsPage(Request $request){
        $news = News::find($request->id);
        $comments=Comment::where('user_id', Auth::user()->id)->where('news_id','=',$news->id)->orderBy('id','desc')->get();
        return view('news/newsPage',['news'=>$news,'comments'=>$comments]);
    }

    public function comment(Request $request){
        Comment::insert(['comment'=>$request->text, 'user_id'=>Auth::user()->id, 'news_id'=>$request->id_news]);
        return redirect()->back()->with('success');
    
    }
}
