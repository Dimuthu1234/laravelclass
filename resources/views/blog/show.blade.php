@extends('layouts.main')

@section('content')

<div class="section">
<div class="container">

<div class="row">
<div class="col-lg-1">
 <!-- Date/Time -->
 <div class="dateinblog">
 <div class="day">
 <p>{{ Carbon\Carbon::parse($blog->created_at)->format('d')}}</p> 
 </div>
<hr>
 <p>{{ Carbon\Carbon::parse($blog->created_at)->format('M')}}</p>
 <p>{{ Carbon\Carbon::parse($blog->created_at)->format('Y')}}</p>
 </div>


</div>
  <!-- Post Content Column -->
  <div class="col-lg-11">

   

    <!-- Preview Image -->
    <img class="img-fluid" src="{{ url('images/blog/'.$blog->image) }}" alt="">
 <!-- Title -->
 <h1 class="mt-4">{{ $blog->title }}</h1>
  <!-- Author -->
  <p class="lead">
      by
      <a href="#">{{ $blog->blogAuthor->name }}</a>
    </p>
    <hr>

<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_skype"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<br>
    <!-- Post Content -->
    <p class="lead">{{ $blog->body }}</p>




   </div>
   </div>
</div>


@endsection

