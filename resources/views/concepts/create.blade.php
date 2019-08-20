@extends('layouts.app')

@section('content')
<div class="container">
<h1>Añadir concepto</h1>
@if( session('info') )
    <h3>{{ session('info') }}</h3>
@endif
</div>
<form class="container-fluid" action={{ route('concepts.store') }} method="POST"
enctype="multipart/form-data">
  @include('concepts.form', [
    'concept' => new App\Concept,
  ])
</form>
<hr>
@stop
