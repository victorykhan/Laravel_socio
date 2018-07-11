@extends('layouts.app')
  @section('content')
<div class="container">
 <div class="jumbotron">
      
        <h1>You spoke and we listened</h1>
        <p>The new social media application powered by <b>Quantum Mechanics</b></p>
        <p><a class="btn btn-danger btn-lg" href="{{route('picture.index')}}" role="button">Act Now</a></p>
   
    </div>


<div class="row">
	

<div class="col-md-4">
	<h5 style="margin-left: 5%; color:#1D02FE; font-weight: 700;">Recent Pictures</h5>

	 @foreach($pics as $pic)       
       <div class="card">
        
          <h6 style="margin-left: 0%; color:white; background-color:#F63374; width: 100%;padding:1%;" class="card-title">{{$pic->title}}</h6>
         
            <img src="/uploads/picturepost/{{$pic->avatar}}" style="width: 100%" />
            
          <!--<p> <b>Category:</b> {{$pic->category->catname}}</p>-->
          <p style="margin-left: 20%; color: blue;"> posted {{$pic->created_at->diffForHumans()}}</p>
      
         
          <a class="btn btn-warning pull-right" href="{{ route('picture.show',$pic->id) }}">Details</a>

        </div>
     
       @endforeach
</div>
<div class="col-md-4">

	<h5 style="margin-left: 5%; color:#F02C05; font-weight: 700;">Recent Videos</h5>

	 @foreach($vids as $vid)       
       <div class="card">
        
          <h6 style="margin-left: 0%; color:white; background-color:#161A4D; width: 100%;padding:2%;" class="card-title">{{$vid->title}}</h6>
         
           <video  controls style="width: 100%; margin-left: 0px; margin-bottom:5%;">
              <source src="/uploads/videopost/{{$vid->myvid}}" >
           
              Your browser does not support the video tag.
            </video>
          <p style="margin-left: 20%; color: blue;"> posted {{$pic->created_at->diffForHumans()}}</p>
      
         
          <a class="btn btn-success pull-right"  href="{{route('video.index')}}">Goto Videos</a>

        </div>
     
       @endforeach
	
</div>
<div class="col-md-4">
	<h5 style="margin-left: 5%; color:#F633FF; font-weight: 700;">Recent Posts</h5>

 @foreach($textposts as $post)       
       <div class="card">
        
          <h6 style="margin-left: 0%; background-color:#161A4D; color: white; word-wrap: break-word;word-break: break-all;padding: 2%" class="card-title">{{$post->title}}</h6>
         
           <p style="word-wrap: break-word;word-break: break-all; padding: 2%;">{{$post->content}}</p>
          <p style="margin-left: 20%; color: green; margin-top: 5%;"> posted {{$post->created_at->diffForHumans()}}</p>
      
         
          <a class="btn btn-info" href="{{ route('textpost.show',$post->id) }}">Read more..</a>

        </div>
     
       @endforeach
	
	
</div>



</div>



@include('layouts.footer')
        
</div>


  @endsection