@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-6 offset-3">
      <h1>Create A Category</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-3">
      <form  action="{{route('category.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group{{ ($errors->has('catname')) ? $errors->first('catname') : '' }}">
          <input type="text" name="catname" class="form-control" placeholder="Enter Category Name Here" required>
          {!! $errors->first('catname','<p class="help-block">:message</p>') !!}
        </div>
        
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="save">
        </div>
      </form>
    </div>
   
  </div>
  @stop