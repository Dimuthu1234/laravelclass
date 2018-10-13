@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Blog Page</div>

                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>



















<div class="container">
	<div class="row">
	<div class="col-md-12">
<h1><center>Blog Page</center></h1>
<!-- Just an image -->

 

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>My First Blog Post</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by chamodya, Sep 27, 2018.</h5>
      <h5><span class="label label-danger">Myself</span> <span class="label label-primary">Education</span></h5><br>
      <p>Hi I am chamodya hirunika.I'm from Sri Lanka .I'm a undergraduate student of National School Of Business Management.I'm Learning Software Engineering For My degree.</p>
      <br><br>
      
      <h4><small>POSTS</small></h4>
      <hr>
      <h2>Officially Blogging</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by chamodya, Sep 24, 2018.</h5>
      <h5><span class="label label-success">Lorem</span></h5><br>
      <p>Sri Lanka (formerly Ceylon) is an island nation south of India in the Indian Ocean. Its diverse landscapes range from rainforest and arid plains to highlands and sandy beaches. It’s famed for its ancient Buddhist ruins, including the 5th-century citadel Sigiriya, with its palace and frescoes. The city of Anuradhapura, Sri Lanka's ancient capital, has many ruins dating back more than 2,000 years.</p>
      <hr>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Anja <small>Sep 29, 2018, 9:12 PM</small></h4>
          <p>Keep up the GREAT work! I am cheering for you!! </p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>rohith <small>Sep 25, 2018, 8:25 PM</small></h4>
          <p>I am so happy for you  Finally. I am looking forward to read about your trendy life. </p>
          <br>
          <p><span class="badge">1</span> Comment:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Ashain<small>Sep 25, 2018, 8:28 PM</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




	<div class="card" style="width: 18rem;">
<img class="card-img-top" src={{"img\birds.jpg"}} alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">First Bloger</h5>
    <p class="card-text">Member Description</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">User Name</li>
    <li class="list-group-item">Address</li>
    <li class="list-group-item">Telephone Number</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
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

<button type="button" class="btn btn-primary">Primary</button>








@endsection