@extends('layouts.main')

@section('content')

<div class="section">
<div class="container">

<div class="row">
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif

 @if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
@endif
</div>

 <div class="row">

            <div class="col-md-8">
            <h2>Blog categories</h2>                   
            </div>
            <div class="col-md-4">
            <a href="{{ route('blog-category.create') }}">
        <button class="pull-right btn btn-default">Add Blog Category</button>                        
            </a>
            </div>
        </div>

    <div class="row">
    <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Description</th>
            <th width="1%"></th>
            <th width="1%"></th>
            <th width="1%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogCategories as $blogCategory)
            <tr>
                <td>{{ $blogCategory->name }}</td>
                <td>{{ $blogCategory->description }}</td>
                <td>
                <a href="{{ route('blog-category.show', $blogCategory->id) }}">
                <button class="actionbtn"><i class="fa fa-bars"></i></button>                
                </a>
                </td>
                <td>
                <a href="{{ route('blog-category.edit', $blogCategory->id) }}">
                <button class="actionbtn"><i class="fa fa-pencil"></i>                
                </a>
                </td>
                <td>
                <form action="{{ route('blog-category.destroy', $blogCategory->id) }}" method='POST'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                <button class="actionbtn"><i class="fa fa-remove"></i>

                </form>                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>

@endsection