@extends('layouts.app')
  @section('content')

<div class="container">
    <div class="col-md-6 offset-3">
      
      <div class="panel-body">

        <form action="{{route('picture.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" class="form-control" required />
                
            </div>

             <div class="form-group">
                <label for="avatar">Upload Picture</label>
                <input type="file" name="avatar"  class="form-control" required/>
                
            </div>

            <div class="form-group">
                <label for="category_id">Select Category:</label>
                <select name="category_id" class="form-control" required>
                    <option value="">--- Select Category ---</option>
                    @foreach ($categorylist as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->catname }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="form-control" required />

            <div class="form-group">
               
                <input  type="submit" value="Submit Picture" class=" btn btn-info" />
                
            </div>

        </form>
      </div>
    </div>
    
</div>

@endsection
