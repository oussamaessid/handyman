@extends('layouts.master')
@section('content')

<div class="card">
  <div class="card-header">subcategory Page</div>
  <div class="card-body">

      <form action="{{ url('subcategory/' .$subcategory->id) }}" method="post">
        {!! csrf_field() !!}
        <select class="form-select" name="service_id" id="service_id">
            <option selected> select Service </option>
            @foreach ($service as $item )
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select></br>
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$subcategory->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$subcategory->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$subcategory->address}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
