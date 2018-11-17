@extends('layouts.main')

@section('content')

<div class="section">
<div class="container">
    <div class="row">
        <div class="row">
            
            <h2>Blog categories</h2>        
        <button class="pull-left">Add Blog Category</button>

        </div>

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
                <td><button class="actionbtn"><i class="fa fa-bars"></i></button></td>
                <td><button class="actionbtn"><i class="fa fa-pencil"></i></td>
                <td><button class="actionbtn"><i class="fa fa-remove"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>

@endsection