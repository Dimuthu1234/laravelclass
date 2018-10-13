@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Blog Page</div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Blog.."><br>

                                    <button class="btn btn-default btnsearch" type="button">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>

                        </div>
<hr>
                            <div class="col-md-9">
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
                                <h2>{{ $blog->title }}</h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $blog->blogAuthor->name }}, {{ \Carbon\Carbon::parse($blog->created_at)->format('M, d, Y') }}.</h5>

                                <p>{{ $blog->body }}</p>
                                <br>
                                    <h5><span class="tag-lable">Myself</span> <span class="tag-lable">Education</span>
                                    </h5><br>
                                @endforeach

                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection