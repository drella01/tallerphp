@extends('layouts.app')

@section('content')
<div class="container">
<h1>New client</h1>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@endif
</div>
<form class="container-fluid" action={{ route('clients.store') }} method="POST">
  @include('clients.form', [
    'client' => new App\Client
  ])
</form>
<hr>
@stop
