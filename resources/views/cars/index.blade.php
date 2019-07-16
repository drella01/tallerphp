@extends('layouts.app')
@section('content')
@if (session()->has('info'))
  <div class="alert alert-success">{{ session('info') }}</div>
@endif
@if (App\Client::all()->pluck('email')->intersect(auth()->user()->email)->count())
  <h2>Hello {{App\Client::all()->pluck('email')->intersect(auth()->user()->email)}}</h2>
@endif
<div class="container col-md-8">
<h1 align="center">Cars</h1>
<div class="card">
<table class="table">
  <thead class="card-header">
    <tr>
      <th>ID</th>
      <th>Registration</th>
      <th>Brand/Model</th>
      <th>Owner</th>
      <th>Year</th>
      <th>Kms</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cars as $car)
      <tr>
        <td>{{ $car->id }}</td>
        <td>
            <a href="{{ route('cars.show', $car->id) }}">
              {{ $car->registration }}</a>
        </td>
        <td>{{ $car->brand }} {{ $car->model}}</td>
        <td>
          <a href="{{ route('clients.show', $car->client->id)}}">{{ $car->client->name }}</a>
        </td>
        <td>{{ $car->year }}</td>
        <td>{{ $car->kms }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@endsection
