@extends('layouts.app')

@section('content')
<head> <h3>Blog add page</h3> </head>


<body>
	<div>
	<form>
   <div class="form-group">
    <div class ="col-xs-2">
    <label for="formGroupExampleInput">ID</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter ID">
     </div>
     <div class ="col-xs-2">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Title">
    </div>
    <div class ="col-xs-2">
     <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="50"></textarea>
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>

@endsection