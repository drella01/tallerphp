@extends('layouts.app')

@section('content')
  <div class="container">
  <h1>WorkOrder</h1>
  </div>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
  <form class="container-fluid" action={{ route('workorders.update', $order->id) }} method="POST">
  @method('PUT')
  @include('workorders.form', [
      'btnText'=>'update',
    ])
  </form>
@endif
  <hr>
@stop
