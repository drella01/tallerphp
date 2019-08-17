@extends('layouts.app')
@section('content')
<div class="container col-md-8">
  <h2>Owner: {{ $car->client['name'] }}</h2>
  <div class="form">
    <table class="table">
      <tr>
        <th>Registration</th>
        <td>{{ $car->registration }}</td>
      </tr>
      <tr>
        <th>Brand</th>
        <td>{{ $car->brand }}</td>
      </tr>
      <tr>
        <th>Model</th>
        <td>{{ $car->model }}</td>
      </tr>
      <tr>
        <th>Year</th>
        <td>{{ $car->year }}</td>
      </tr>
      <tr>
        <th>Kms</th>
        <td>{{ $car->kms }}</td>
      </tr>
      <tr>
        <th>ITV</th>
        <td>{{ $car->itv }}</td>
      </tr>
      <tr>
        <th>Facturas</th>
        @foreach ($facturas as $factura)
          <td>
            <ul>
                <a href="{{ route('facturas.show',$factura->id) }}">
                Factura {{ date('y')*1000 + $factura->id }}<br>
                Fecha {{ date_format(date_create($factura->date),'d-m-y') }}
                </a>
            </ul>
          </td>
        @endforeach
      </tr>
    </table>
    <h3>Last revision: <strong>{{ $car->updated_at->format('d-M-Y') }}</strong></h3>
  </div>
  <div class="btn-group btn-group-sm">
      <a class="btn btn-primary btn-xs"
          href="#">Edit</a>
  </div>
</div>

@endsection
