@extends('layouts.app')

@section('content')
  <div class="container col-md-8">
  <h1>WorkOrder</h1>
  </div>
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
  <form class="container-fluid" action={{ route('workorders.store') }} method="POST">
  @include('workorders.form', [
      'workorder' => new App\WorkOrder
    ])
  </form>
@endif
  <hr>
@stop
