@extends('layouts.app')
  @section('content')
  
    <div class="container">
      

  <div class="col-md-10 offset-1">
    <h2 class="btn btn-warning indexhead">All Video Posts</h2>
      <a href="{{route('video.create')}}" class="btn btn-info pull-right indexhead">Post Video</a><br><br>
   




     @guest




 @foreach($vids as $vid)       
    <div class="card">
    
        <div class="card-body" style="background-color: #a3c2c2 !important;">
           
          <h4 class="card-title">{{$vid->title}}</h4>
          <div class="card-text">

            <video  controls>
              <source src="/uploads/videopost/{{$vid->myvid}}" >
           
              Your browser does not support the video tag.
            </video>
            
            </div>
          <p> <b>Category:</b> {{$vid->category->catname}}</p>
          <p> Posted by: {{$vid->user->fname}} {{$vid->user->lname}}, {{$vid->created_at->diffForHumans()}}</p>
          

        
          
        </div>



            </div> 




        
<h6 class="border-bottom border-gray pb-2 mb-0">Recent Comments on the video</h6>
@if(count($vid->comments))
@foreach($vid->comments as $comment)
     <div class="media text-muted pt-3">
          <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
            {{$comment->content}}

          </p>
          <button type="button" class="btn btn-primary" style="margin-right: 5%">
          <span class="badge badge-light">{{$comment->created_at->diffForHumans()}}</span>
         </button>
        </div>
           @endforeach
          @endif

        
    <br/>
    
    

         <form action="{{route('comment.store')}}"  method="POST">
            {{csrf_field()}}


             <div class="form-group">
                
                <textarea name="content" rows="3" class="form-control" placeholder="..post a comment..." required></textarea>
                
            </div>

            <input type="hidden" name="video_id" value="{{$vid->id}}" class="form-control" required />

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Send Comment" class=" btn btn-success" />
                
            </div>

        </form>
    <br/>  


        @endforeach



     @else

      @foreach($vids as $vid)       
    <div class="card">
    
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('video.edit',$vid->id) }}">Edit</a>
          <h4 class="card-title">{{$vid->title}}</h4>
          <div class="card-text">

            <video  controls>
              <source src="/uploads/videopost/{{$vid->myvid}}" >
           
              Your browser does not support the video tag.
            </video>
            
            </div>
          <p> <b>Category:</b> {{$vid->category->catname}}</p>
          <p> Posted by: {{$vid->user->fname}} {{$vid->user->lname}}, {{$vid->created_at->diffForHumans()}}</p>
          

           <div class="col-md-4">
                
            
   
       <form action="{{ route('video.destroy', $vid->id) }}" method="POST">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
      </form>

     </div>
          
        </div>



            </div> 




        
<h6 class="border-bottom border-gray pb-2 mb-0">Recent Comments on the video</h6>
@if(count($vid->comments))
@foreach($vid->comments as $comment)
     <div class="media text-muted pt-3">
          <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
            {{$comment->content}}

          </p>
          <div style="margin-right: 2px;">
           <p > <span><a href="{{route('comment.editvid', $comment->id)}}"><i class="btn btn-warning fa fa-pencil-square" aria-hidden="true"></i></a></span></p>   
            
       </div>
          <button type="button" class="btn btn-primary" style="margin-right: 5%">
          <span class="badge badge-light">{{$comment->created_at->diffForHumans()}}</span>
         </button>
        </div>
           @endforeach
          @endif

        
    <br/>
    
    

         <form action="{{route('comment.store')}}"  method="POST">
            {{csrf_field()}}


             <div class="form-group">
                
                <textarea name="content" rows="3" class="form-control" placeholder="..post a comment..." required></textarea>
                
            </div>

            <input type="hidden" name="video_id" value="{{$vid->id}}" class="form-control" required />

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Send Comment" class=" btn btn-success" />
                
            </div>

        </form>
    <br/>  


        @endforeach


     @endguest
     
      

        


    </div> 
    @include('layouts.footer')
  </div>


@endsection