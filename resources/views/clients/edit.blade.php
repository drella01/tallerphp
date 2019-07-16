@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edit client {{ $client->name }}</h1>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
<form class="container-fluid" action={{ route('clients.update', $client->id) }} method="POST">
  @method('PUT')
  @include('clients.form', [
    'btnText' => 'Update',
  ])
</form>
<div class="col-md-8">
  @foreach ($client->cars as $car)
    <div class="card">
    <div class="card-header">
      {{ $car->registration }}: {{ $car->brand }} {{ $car->model }}
    </div>
  @endforeach
</div>
@endif
<hr>
</div>
@stop
