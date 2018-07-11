@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-6 offset-3">
      <h1>Edit Category</h1>
    </div>
  </div>
  <div class="col-md-6 offset-3">
    <form action="{{route('category.update',$category->id)}}"   method="post">
      <input name="_method" type="hidden" value="PATCH">
      {{csrf_field()}}
      <div class="form-group{{ ($errors->has('catname')) ? $errors->first('catname') : '' }}">
        <input type="text" name="catname" class="form-control" placeholder="Enter Category Name Here" value="{{$category->catname}}">
        {!! $errors->first('catname','<p class="help-block">:message</p>') !!}
      </div>
      
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="save">
      </div>
    </form>
  </div>
  @stop