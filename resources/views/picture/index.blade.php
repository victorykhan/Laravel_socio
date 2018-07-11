@extends('layouts.app')
  @section('content')
  <div class="container">
   
      
    

  <div class="col-md-10 offset-1">
    <h2 class="btn btn-warning indexhead">All Picture Posts</h2>
    
      <a href="{{route('picture.create')}}" class="btn btn-info pull-right indexhead">Post Picture</a><br><br>
     

       @guest






        @foreach($pics as $pic)       
       <div class="pic_index card">
        <div class="card-body" style="background-color: #e6ccff !important;">
          <h4 class="card-title">{{$pic->title}}</h4>
          <div class=" card-text">
            <img src="/uploads/picturepost/{{$pic->avatar}}"/>
            </div>
          <!--<p> <b>Category:</b> {{$pic->category->catname}}</p>-->
          <p> Posted by: <b> {{$pic->user->fname}} {{$pic->user->lname}},</b> {{$pic->created_at->diffForHumans()}}</p>
      
         
          <a class="btn btn-info pull-right" href="{{ route('picture.show',$pic->id) }}">Details</a>

        </div>



            </div> 




        
<h6 class="border-bottom border-gray pb-2 mb-0 index_comment">Recent Comments</h6>
@if(count($pic->comments))
@foreach($pic->comments as $comment)
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
    
    
<div >
         <form action="{{route('comment.store')}}"   method="POST">
            {{csrf_field()}}


             <div class="form-group">
                
                <textarea  name="content" rows="3" class=" form-control" placeholder="..post a comment..." required></textarea>
                
            </div>

            <input type="hidden" name="picture_id" value="{{$pic->id}}" class="form-control" required />

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Send Comment" class=" btn btn-success" />
                
            </div>

        </form>
    <br/>  
  </div>
  


        @endforeach


       @else
     
      

        @foreach($pics as $pic)       
       <div class="pic_index card">
        <div class="card-body">
          <h4 class="card-title">{{$pic->title}}</h4>
          <div class="card-text">
            <img src="/uploads/picturepost/{{$pic->avatar}}"/>
            </div>
          <p> <b>Category:</b> {{$pic->category->catname}}</p>
          <p> Posted by: {{$pic->user->fname}} {{$pic->user->lname}}, {{$pic->created_at->diffForHumans()}}</p>
          
         
          

         
          <a class="btn btn-info" href="{{ route('picture.show',$pic->id) }}">Details</a>
          <a class="btn btn-primary" href="{{ route('picture.edit',$pic->id) }}">Edit</a>
        
         
       
          
        </div>



            </div> 




        
<h6 class="border-bottom border-gray pb-2 mb-0">Recent Comments</h6>
@if(count($pic->comments))
@foreach($pic->comments as $comment)
     <div class="media text-muted pt-3">
          <img src="/uploads/avatars/{{$comment->user->avatar }}" alt="" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$comment->user->fname}} {{$comment->user->lname}}</strong>
            {{$comment->content}}

          </p>

          <div style="margin-right: 2px;">
           <p > <span><a href="{{route('comment.editpic', $comment->id)}}"><i class="btn btn-warning fa fa-pencil-square" aria-hidden="true"></i></a></span></p>   
            
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

            <input type="hidden" name="picture_id" value="{{$pic->id}}" class="form-control" required />

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