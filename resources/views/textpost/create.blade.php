@extends('layouts.app')
  @section('content')

<div class="container">
    <div class="col-md-6 offset-3">
      
      <div class="panel-body">

        <form action="{{route('textpost.store')}}" method="POST">
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Post Title:</label>
                <input name="title" class="form-control" required />
                
            </div>

             <div class="form-group">
                <label for="content">Description:</label>
                <textarea name="content" rows="5" class="form-control" required></textarea>
                
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
               
                <input  type="submit" value="Submit" class=" btn btn-info" />
                
            </div>

        </form>
      </div>
    </div>
    @include('layouts.footer')
</div>

@endsection
