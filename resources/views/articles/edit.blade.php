@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Article') }}</div>

                    <div class="card-body">
                        <form class="form" action="{{route('article.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input name="title" type="text" class="input-group">
                            <textarea class="input-group" name="content"></textarea>
                            <input name="teaser" type="text" class="input-group">
                            <input name="image" type="text" class="input-group">
                            <input name="status" type="radio" value="1" selected>
                            <input name="status" type="radio" value="0">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
