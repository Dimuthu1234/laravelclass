@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-12">
<h1>My Blog Page Index File</h1>

		<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Content</th>
		</tr>
	</thead>
	<tbody>
@foreach($blogs as $blog)
		<tr>
			<td>{{ $blog->id }}</td>
			<td>{{ $blog->title }}</td>
			<td>{{ $blog->body }}</td>
		</tr>
@endforeach
	</tbody>
</table>
	</div>
</div>
</div>









@endsection