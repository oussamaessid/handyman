@extends('layouts.master')
@section('content')


<div class="card">
  <div class="card-header">Provider Page</div>
  <div class="card-body">


        <div class="card-body">
        <p class="card-title">Name : {{ $provider->name }}</p>
        <p class="card-text">email : {{ $provider->email }}</p>

  </div>

    </hr>

  </div>
</div>
