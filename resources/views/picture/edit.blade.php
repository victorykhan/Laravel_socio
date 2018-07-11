@extends('layouts.app')
  @section('content')

<div class="container">
    <div class="col-md-6 offset-3">
      <div class="btn btn-primary">Updated Picture Post</div>

      <div class="panel-body">

        <form action="{{ route('picture.update', $picture->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

            <div class="form-group">
                <label for="title">Update Title</label>
                <input name="title" class="form-control"  value="{{ $picture->title }}" />
                
            </div>

             <div class="form-group">
                <label for="avatar">Change Picture</label>
                <input type="file" name="avatar"  class="form-control" />
                <div class="col-md-4" style="margin-top: 10px;">
                <img src="/uploads/picturepost/{{$picture->avatar}}" style="margin-top: 5px; border-radius: 10px;" width="200" />
               </div>
                
            </div>
            

            <div class="form-group">
                <label for="category_id">Select Category:</label>
                <select name="category_id" class="form-control" >
                    <option value="">{{$picture->category->catname}}</option>
                    @foreach ($categorylist as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->catname }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Update Picture" class=" btn btn-info" />
                
            </div>

        </form>

      </div>
    </div>
  
</div>

@endsection
