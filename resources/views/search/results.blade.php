@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'sss' }}</div>

                    <div class="card-body">
                        @foreach($results as $record)
                            {{ $record->title }}
                            <img src="{{ $record->image }}">
                        @endforeach
                        {{$results->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
