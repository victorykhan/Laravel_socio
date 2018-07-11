@extends('layouts.app')


@section('content')
<div class="container">
   
      
    

  <div class="col-md-10 offset-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Picture</h2>
            </div>
            
        </div>
    </div>

@guest

<div class="row">
        <a class="btn btn-primary" href="{{ route('picture.index') }}"> Back</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $picture->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="/uploads/picturepost/{{$picture->avatar}}"/>
            <br/>
             <p> <b>Category:</b> {{$picture->category->catname}}</p>
             <br/>
          <p> Posted by: {{$picture->user->fname}} {{$picture->user->lname}}, {{$picture->created_at->diffForHumans()}}</p>
        </div>
        
    </div>

@else
    <div class="row">
      <div class="col-md-8">
        <a class="btn btn-primary" href="{{ route('picture.index') }}"> Back</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $picture->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="/uploads/picturepost/{{$picture->avatar}}"/>
            <br/>
             <p> <b>Category:</b> {{$picture->category->catname}}</p>
             <br/>
          <p> Posted by: {{$picture->user->fname}} {{$picture->user->lname}}, {{$picture->created_at->diffForHumans()}}</p>
        </div>
        
    </div>
  </div>

    <div class="col-md-4">
                
            
   
       <form action="{{ route('picture.destroy', $picture->id) }}" method="POST">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
      </form>

     </div>

   @endguest 
</div>

</div>
@endsection