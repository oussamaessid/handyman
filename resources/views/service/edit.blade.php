@extends('service.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Services Page</div>
  <div class="card-body">
      
      <form action="{{ url('service/' .$service->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$service->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$service->name}}" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="address" value="{{$service->address}}" class="form-control"></br>
    
    </form>
   
  </div>
</div>
 
@stop