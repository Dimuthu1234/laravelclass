@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Blog add page</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blog.store') }}">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-10">
                                <input id="" type="text" class="form-control" name="title" required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-10">
                                <textarea id="" type="text" class="form-control" name="body" style="height: 200px" required ></textarea>                          
                            </div>
                        </div>                                  
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2 pull-right">



                                <input type='file' onchange="readURL(this);" />
                                <br>
                                <img id="blah" src="http://placehold.it/180" style="width: 180px;height: 180px" alt="your image" />
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                    {{--</form>--}}



                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
