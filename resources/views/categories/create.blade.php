@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Category') }}</div>

                    <div class="card-body">
                        <form class="form" action="{{route('category.store')}}" method="POST">
                            @csrf
                            <input name="name" type="text" class="input-group">
                            <select name="parent_id">
                                <option value="0">------</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" class="btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
