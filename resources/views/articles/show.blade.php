@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $article->name }}</div>

                    <div class="card-body">
                        <img src="{{$article->image}}">
                        <p>
                            {{$article->content}}
                        </p>
                    </div>
                    <div class="wrapper">
                        @foreach($article->comments as $comment)
                            <div class="">
                                {{$comment->message}}
                            </div>
                        @endforeach
                        {{$article->id}}
                            <br>
                        <form action="{{route('comment.post')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$article->id}}" name="article_id">
                            <input type="text" name="message">
                            <input type="submit" value="Post">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
