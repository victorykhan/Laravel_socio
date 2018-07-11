@extends('layouts.app')


  @section('content')
  <div class="container">
   
      
    

  <div class="col-md-10 offset-1">
    <h2 class="btn btn-warning indexhead">All TextPosts</h2>
    
      <a href="{{route('textpost.create')}}" class="btn btn-info indexhead pull-right">New Post</a><br><br>
     



      @guest


       @foreach($textposts as $textpost)       
    <div class="card" >
        <div class="card-body" style="background-color: #a3c2c2 !important;">
          <h4 class="card-title">{{$textpost->title}}</h4>
          <p class="card-text">{{$textpost->content}}</p>
          <p> <b>Category:</b> {{$textpost->category->catname}}</p>
          <p> Posted by: {{$textpost->user->fname}} {{$textpost->user->lname}}, {{$textpost->created_at->diffForHumans()}}</p>
         
          <a class="btn btn-info" href="{{ route('textpost.show',$textpost->id) }}">Details</a>
          
        </div>

        


    </div> 



<h6 class="border-bottom border-gray pb-2 mb-0">Recent Comments</h6>
@if(count($textpost->comments))
@foreach($textpost->comments as $comment)
     <div class="media text-muted pt-3 thiscomment">
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

            <input type="hidden" name="textpost_id" value="{{$textpost->id}}" class="form-control" required />

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="card-footer">
               
                <input  type="submit" value="Send Comment" class=" btn btn-success" />
                
            </div>

        </form>


       
    <br/>    
      @endforeach
      {{$textposts->links()}}
    </div>







      @else
     
     @foreach($textposts as $textpost)       
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{$textpost->title}}</h4>
          <p class="card-text">{{$textpost->content}}</p>
          <p> <b>Category:</b> {{$textpost->category->catname}}</p>
          <p> Posted by: {{$textpost->user->fname}} {{$textpost->user->lname}}, {{$textpost->created_at->diffForHumans()}}</p>
         <a href="{{route('textpost.edit', $textpost->id)}}" class="btn btn-info">Edit</a>
          <a class="btn btn-info" href="{{ route('textpost.show',$textpost->id) }}">Details</a>
          
        </div>

        


    </div> 



<h6 class="border-bottom border-gray pb-2 mb-0">Recent Comments</h6>
@if(count($textpost->comments))
@foreach($textpost->comments as $comment)
     <div class="media text-muted pt-3 thiscomment">
          <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
            {{$comment->content}}

          </p>
           <div style="margin-right:2%;">
           <p > <span><a href="{{route('comment.edit', $comment->id)}}"><i class="btn btn-warning fa fa-pencil-square" aria-hidden="true"></i></a></span></p>   
            
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

            <input type="hidden" name="textpost_id" value="{{$textpost->id}}" class="form-control" required />

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="card-footer">
               
                <input  type="submit" value="Send Comment" class=" btn btn-success" />
                
            </div>

        </form>


       
    <br/>    
      @endforeach
      {{$textposts->links()}}
      

     @endguest
     @include('layouts.footer')
   </div>

</div>
          


 @endsection 
   
    
 
  

  
 

