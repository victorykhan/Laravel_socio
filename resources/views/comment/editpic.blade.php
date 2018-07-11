
@extends('layouts.app')
  @section('content')











<!--Comment edit form -->
        <div class="container">

        	<div class="row">

        	<div class="col-md-6">
          
         <form  action="{{route('comment.update',$comment->id)}}" type="hidden"  method="POST">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

             <div class="form-group">
                
                <textarea name="content" rows="3" class="form-control" placeholder="..post a comment..." required>{{$comment->content}}</textarea>
                
            </div>

           
            <input type="hidden" name="picture_id" value="{{$comment->picture->id}}" class="form-control"  />
            

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Update Comment" class=" btn btn-success" />
                
            </div>

        </form>
    </div>

    <div class="col-md-3">

        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" value="Delete Comment" class=" btn btn-danger"  onclick="return confirm('Are you sure to delete?')"/>
            
           
         </form>
     </div>
 </div>
      </div>

@endsection