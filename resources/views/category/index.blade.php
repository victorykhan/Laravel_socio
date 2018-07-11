@extends('layouts.app')
  @section('content')
  <div class="container">
    <div class="col-md-6">
      <h3>Available Categories</h3>
    </div>
  
  <div class="col-md-6">
    <table class="table table-striped">
      <a href="{{route('category.create')}}" class="btn btn-info pull-right">Create New Category</a><br><br>
      <tr>
        
       
        <th>Description</th>
        <th>Actions</th>
      </tr>
     
     
      @foreach($categories as $category)
        <tr>
        
        
          <td>{{$category->catname}}</td>
          <td>
             
            <form action="{{route('category.destroy',$category->id)}}" method="post">
              <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  @stop
 
</div>