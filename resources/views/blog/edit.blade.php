@extends('layouts.main')

@section('content')


<div class="card-body">
{!! Form::open(['files' => true, 'route' => ['blog.update', $blog], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}


                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-10">
                                <input id="" type="text" class="form-control" name="title" value='{{$blog->title}}'required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-10">
                                <textarea id="summernote" type="text" class="form-control" name="body" style="height: 200px" required autofocus>{{$blog->body}}</textarea>                          
                            </div>
                            <div class="container">
                            <div class="col-md-10">
                            <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" >
                            </div>
</div>
                        </div>                                  
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2 pull-right">



                                <input type='file' name="image" onchange="readURL(this);"   />
                                <br>
                                <img id="blah" src="http://placehold.it/180" style="width: 180px;height: 180px" alt="your image" />
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                                {!! Form::close() !!}
                                </div>


@endsection


@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush



