@extends('front.common.main')
@section('content')


<form action = "../message" method="POST" accept-charset="UTF-8"> 
{{  csrf_field() }}
  <div class="mb-3">
    <label for="title" class="form-label" >Title </label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Title here">
    
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Message Description</label>
    <textarea class="form-control" id="body" name="body" rows="3" placeholder="Describe message "></textarea>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<div style="height:150px;"></div> 

@endsection