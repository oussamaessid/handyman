@extends('layouts.master')
@section('content')

<div class="card">
  <div class="card-header">Provider Page</div>
  <div class="card-body">

      <form action="{{ url('provider-liste') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Prenom</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control"></br>
        <label>Age</label></br>
        <input type="text" name="age" id="age" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Password</label></br>
        <input type="password" name="password" id="password" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
