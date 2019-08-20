@extends('layouts.app')

@section('content')
<div class="container col-md-8">
<h1>Edit concept</h1>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@endif
<form class="container-fluid" action={{ route('concepts.update', $concept->id) }} method="POST"
        enctype="multipart/form-data">
  @method('PUT')
  <h2>{{ $concept->concept }} - {{ $concept->brand }}</h2>
  <img src="{{ Storage::url($concept->image) }}" alt="imagen" width="70">
  @include('concepts.form', [
    'btnText' => 'Update',
  ])
</form>
<hr>
</div>
@stop
