@extends('layouts.app')


@section('content')
<div class="container">
   
      
    

  <div class="col-md-10 offset-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Textpost</h2>
            </div>
            
        </div>
    </div>

  @guest
  <div class="row">
        <a class="btn btn-primary" href="{{ route('textpost.index') }}"> Back</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $textpost->title}}
            </div>
             <p class="card-text">{{$textpost->content}}</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
           
            <br/>
             <p> <b>Category:</b> {{$textpost->category->catname}}</p>
             <br/>
          <p> Posted by: {{$textpost->user->fname}} {{$textpost->user->lname}}, {{$textpost->created_at->diffForHumans()}}</p>
        </div>
        
    </div>
  @else
    <div class="row">
        <a class="btn btn-primary" href="{{ route('textpost.index') }}"> Back</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $textpost->title}}
            </div>
             <p class="card-text">{{$textpost->content}}</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
           
            <br/>
             <p> <b>Category:</b> {{$textpost->category->catname}}</p>
             <br/>
          <p> Posted by: {{$textpost->user->fname}} {{$textpost->user->lname}}, {{$textpost->created_at->diffForHumans()}}</p>
        </div>
        
    </div>
    <div class="pull-right">
                
            
   
       <form action="{{ route('textpost.destroy', $textpost->id) }}" method="POST">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
      </form>

     </div>

    
</div>
@endguest

</div>
@endsection