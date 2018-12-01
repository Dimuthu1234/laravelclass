@extends('layouts.main')

@section('content')
<div class= "section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Blog Category Edit page</h3></div>

                <div class="card-body">
                        {!! Form::model($blogCategory, ['route' => ['blog-category.update', $blogCategory], 'method' => 'PATCH']) !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-10">
                                <input id="" type="text" class="form-control" name="name" value='{{ $blogCategory->name }}' required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Description</label>

                           <div class="col-md-10">
                                <textarea class="form-control" name="description" required>{{ $blogCategory->description }}</textarea>                       
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Category Color</label>

                            <div class="col-md-10">
                                <input id=""  class="form-control jscolor" value="{{$blogCategory->color}}" name="color" required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                    
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">
                                    Update
                                </button>                       
                            </div>

                              
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

