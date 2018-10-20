@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <li>{{ $blog->id }}</li>
                <li>{{ $blog->title }}</li>
                <li>{{ $blog->body }}</li>
                <img src="{{ url('images/blog/'.$blog->image) }}" style="width: 500px; height: 400px; margin-top: 3%">
            </div>
        </div>
    </div>


@endsection

