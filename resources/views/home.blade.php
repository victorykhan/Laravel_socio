@extends('layouts.app')
@section('scripts')
<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="background-color: cyan;" class="card-header"><h3>Dashboard Activities</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                   <div class="row">

                    <div class="col-md-8 offset-2" id="tabs">
                      <ul>
                        <li><a href="#pictures">Picture Posts</a></li>
                        <li><a href="#videos">Video Posts</a></li>
                        <li><a href="#messages">Text Posts</a></li>
                        <li><a href="#comments">All Comments</a></li>
                      </ul>
                      <div id="pictures">


                            @foreach($pictures as $pic)       
                           <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">{{$pic->title}}</h4>
                              <div class="card-text prof">
                                <img src="/uploads/picturepost/{{$pic->avatar}}"/>
                                </div>
                              <p> <b>Category:</b> {{$pic->category->catname}}</p>
                              <p>  {{$pic->created_at->diffForHumans()}}</p>
               
                             
                              <a class="btn btn-info" href="{{ route('picture.show',$pic->id) }}">Details</a>
                       
                              
                            </div>


                              </div> 
                                @endforeach
                        
                      </div>
                      <div id="videos">


                        @foreach($videos as $vid)       
                               <div class="card">
                        
                                <div class="card-body">
                               
                                <h4 class="card-title">{{$vid->title}}</h4>
                                <div class="card-text">

                                <video width="500" height="300" controls>
                                  <source src="/uploads/videopost/{{$vid->myvid}}" >
                               
                                  Your browser does not support the video tag.
                                </video>
                                
                                </div>
                              <p> <b>Category:</b> {{$vid->category->catname}}</p>
                              <p>  {{$vid->created_at->diffForHumans()}}</p>

                              

                            
                              
                             </div>
                             



                            </div> 
                            @endforeach
                        
                      </div>
                      <div id="messages">


                           @foreach($textposts as $textpost)       
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">{{$textpost->title}}</h4>
                              <p class="card-text">{{$textpost->content}}</p>
                              <p> <b>Category:</b> {{$textpost->category->catname}}</p>
                              <p>  {{$textpost->created_at->diffForHumans()}}</p>
                             
                              <a class="btn btn-info" href="{{ route('textpost.show',$textpost->id) }}">Details</a>
                              
                            </div>

                            


                        </div> 
                        @endforeach
                       
                        
                      </div>


                      <div id="comments">
                        

                        @foreach($comments as $comment)

                              @if(($comment->picture))

                              <div class="panel panel-default">
                                <div class="panel-heading"><h4>Picture Title :{{$comment->picture->title}}</h4></div>
                                
                                <div class="panel-footer"> <a class="btn btn-info" href="{{ route('picture.show',$comment->picture->id) }}">Details</a></div>
                              </div>

                              
                             <div class="media text-muted pt-3">
                                  <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
                                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
                                    {{$comment->content}}

                                  </p>
                                  <button type="button" class="btn btn-warning">
                                  <span class="badge badge-light">{{$comment->created_at->diffForHumans()}}</span>
                                 </button>
                                </div>
                                @endif


                                   @if(($comment->video))

                              <div class="panel panel-default">
                                <div class="panel-heading"><h4>Video Title :{{$comment->video->title}}</h4></div>
                                
                                <div class="panel-footer"> <a class="btn btn-warning" href="{{ route('video.show',$comment->video->id) }}">Details</a></div>
                              </div>

                              
                             <div class="media text-muted pt-3">
                                  <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
                                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
                                    {{$comment->content}}

                                  </p>
                                  <button type="button" class="btn btn-success">
                                  <span class="badge badge-light">{{$comment->created_at->diffForHumans()}}</span>
                                 </button>
                                </div>
                                @endif



                                   @if(($comment->textpost))

                              <div class="panel panel-default">
                                <div class="panel-heading"><h4>Post Title :{{$comment->textpost->title}}</h4></div>
                                
                                <div class="panel-footer"> <a class="btn btn-secondary" href="{{ route('textpost.show',$comment->textpost->id) }}">Details</a></div>
                              </div>

                              
                             <div class="media text-muted pt-3">
                                  <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
                                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
                                    {{$comment->content}}

                                  </p>
                                  <button type="button" class="btn btn-danger">
                                  <span class="badge badge-light">{{$comment->created_at->diffForHumans()}}</span>
                                 </button>
                                </div>
                                @endif

        
                            @endforeach
                        
                      </div>


                    </div>

                   </div>





                </div>
            </div>
        </div>
    
</div>



@endsection
