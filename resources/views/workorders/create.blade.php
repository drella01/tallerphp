@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <h1>WorkOrder</h1>
    @if( session()->has('info') )
        <h3>{{ session('info') }}</h3>
    @endif
</div>
<form class="container-fluid" action={{ route('workorders.store') }} method="POST"
onsubmit="alert('Orden de trabajo creada')">
    @include('workorders.form', [
        'workorder' => new App\WorkOrder
        ])
</form>
<hr>
@stop
