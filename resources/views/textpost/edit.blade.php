@extends('layouts.app')
  @section('content')

<div class="container">
    <div class="col-md-6 offset-3">
      <div class="btn btn-primary">Update the Post</div>

      <div class="panel-body">

        <form action="{{ route('textpost.update', $textpost->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

            <div class="form-group">
                <label for="title">Update Title</label>
                <input name="title" class="form-control"  value="{{ $textpost->title }}" />
                
            </div>

            <div class="form-group">
                <label for="title">Change Content</label>
                <textarea name="content" class="form-control" rows="3"  />{{ $textpost->content }}</textarea>
                
            </div>

            

            <div class="form-group">
                <label for="category_id">Select Category:</label>
                <select name="category_id" class="form-control" >
                    <option value="">{{$textpost->category->catname}}</option>
                    @foreach ($categorylist as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->catname }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Update Textpost" class=" btn btn-info" />
                
            </div>

        </form>

      </div>

    </div>


    
</div>

@endsection