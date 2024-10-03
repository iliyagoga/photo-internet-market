
@extends ('layouts.app')

@section('content')
<div class="body">
    {{Breadcrumbs::render('newsPage',$news)}}
    <h1>{{$news->title}}</h1>
    <div class="news">
        <div class="block">
            <div class="preview">
                <img src={{Storage::url($news->image)}} alt="">
            </div>
            <div class="content">
                <div class="date">
                    <span>{{(new DateTime($news->created_at))->format('j F Y')}}</span>
                </div>
                <div class="text">
                    <p>{{$news->text}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="comments">
        @if(Auth::check())
        <div class="form">
            <form action="{{route('comment')}}" method="post">
                @csrf
                <input type="hidden" name="id_news" value="{{$news->id}}">
                <textarea name="text" id="" placeholder="Ваш комментарий"></textarea>
                <button type="submit">Отправить</button>
            </form>
        </div>
        @endif
        <div class="forum">
            @foreach ($comments as $comment)
                <div class="comment">
                    <div class="user">
                            <span>{{$comment->user->name}} {{$comment->user->sername}}</s>
                    </div>
                    <div class="text">
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
            
            @endforeach
        </div>
    
    </div>
</div>
@endsection('content')