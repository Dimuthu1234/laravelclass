@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @if(session('success') || session('error'))
                        <div class="col-md-12">
                            @if (session('success'))
                                <div class="notification success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="notification danger-alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">Blog Page</div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 3%">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Blog.."><br>

                                    <button class="btn btn-default btnsearch" type="button">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>

                        </div>

                            <div class="col-md-9" style="margin-top: 3%">
                                <h4>
                                    <small>RECENT POSTS</small>
                                    <div class="pull-right">
                                        <button>
                                            <a style="color: #fff; text-underline-mode: off" href="{{ route('blog.create') }}">Add a Blog</a>
                                        </button>
                                    </div>
                                </h4>
                                <hr>

                                @foreach($blogs as $blog)
                                    <div class="blog-v">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h2>{{ $blog->title }}</h2>
                                                <h5><span class="glyphicon glyphicon-time"></span>
                                                    {{--Post by {{ $blog->blogAuthor->name }}, --}}
                                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M, d, Y') }}.</h5>

                                                <p>{{ $blog->body }}</p>
                                                <br>
                                                <h5><span class="tag-lable">Myself</span> <span class="tag-lable">Education</span>
                                                </h5><br>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('images/blog/'.$blog->image) }}" style="width: 200px; height: 150px">
                                                <div class="" style="margin-top: 2%">
                                                    <button>
                                                        <a style="color: #fff; text-underline-mode: off" href="{{ route('blog.show', $blog->id) }}">Read More...</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                                <div class="pagi">
                                {{ $blogs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection