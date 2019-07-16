@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edit concept</h1>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
<form class="container-fluid" action={{ route('concepts.update', $concept->id) }} method="POST">
  @method('PUT')
  @include('concepts.form', [
    'btnText' => 'Update',
  ])
</form>
@endif
<hr>
</div>
@stop
