@extends('layouts.main')

@section('content')

<div class ="section">
    <div class ="container">
    <div class="card text-white bg-secondary mb-3" style="width: 50rem;">
        <img class="card-img-top" src="{{ url('images/blog/'.$blog->image) }}" alt="Card image cap">
        <div class="card-body">
            <h5>{{ $blog->id }}</h5>
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">{{ $blog->body }}</p>
        </div>
    </div>
    </div>
</div>

@endsection

