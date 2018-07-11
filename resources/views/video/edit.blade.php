@extends('layouts.app')
  @section('content')

<div class="container">
    <div class="col-md-6 offset-3">
      <div class="btn btn-primary">Update Video</div>

      <div class="panel-body">

        <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

            <div class="form-group">
                <label for="title">Update Title</label>
                <input name="title" class="form-control"  value="{{ $video->title }}" />
                
            </div>

             <div class="form-group">
                <label for="avatar">Change Video</label>
                <input type="file" name="myvid"  class="form-control" />
               <video width="500" height="300" controls>
              <source src="/uploads/videopost/{{$video->myvid}}" >
           
              Your browser does not support the video tag.
            </video>
                
            </div>
            

            <div class="form-group">
                <label for="category_id">Select Category:</label>
                <select name="category_id" class="form-control" >
                    <option value="">{{$video->category->catname}}</option>
                    @foreach ($categorylist as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->catname }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Update Video" class=" btn btn-info" />
                
            </div>

        </form>

      </div>
    </div>
  
</div>

@endsection