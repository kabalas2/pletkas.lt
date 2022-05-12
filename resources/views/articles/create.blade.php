@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Article') }}</div>

                    <div class="card-body">
                        <form class="form" action="{{route('article.store')}}" method="POST">
                            @csrf
                            <input name="title" type="text" class="input-group">
                            <textarea class="input-group" name="content"></textarea>
                            <input name="teaser" type="text" class="input-group">
                            <input name="image" type="text" class="input-group">
                            <div class="">
                                @foreach($categories as $category)
                                    <input type="checkbox" value="{{$category->id}}" name="category_id[]" > {{$category->name}}<br>
                                    @foreach($category->childs as $child)
                                        ---<input type="checkbox" value="{{$child->id}}" name="category_id[]" > {{$child->name}}<br>
                                    @endforeach
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
