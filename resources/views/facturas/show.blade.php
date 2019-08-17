@extends('layouts.app')

@section('content')
<div class="container col-md-6">
  <div class="card">
    <table class="card-header col-md-6">
      <thead class="card-header" align="left">
        <tr>
          <th>Cliente</th>
          <td>{{ $factura->car->client->name}}</td>
        </tr>
        <tr>
          <th>Matricula</th>
          <td>{{$factura->car->registration}}</td>
        </tr>
        <tr>
          <th>Modelo</th>
          <td>{{ $factura->car->brand }} - {{ $factura->car->model }}</td>
        </tr>
      </thead>
    </table>
    <br>
    <table class="table">
      <thead class="card-header" align="center">
        <tr>
          <th>Concept</th>
          <th>Units</th>
          <th>Price</th>
          <th>Total</th>
          <th>Discount</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($workorders as $workorder)
          <tr>
            <td align="center">
              {{ $workorder->concept->concept }}
            </td>
            <td align="center">
              {{ $workorder->units }}
            </td>
            <td align="center">
              {{ '€ '.$workorder->concept->price }}
            </td>
            <td align="right">{{ '€ '.$workorder->total }}</td>
            <td align="right">{{ '€ '.$workorder->discount }}</td>
          </tr>
        @endforeach
          <tr>
            <td>SUB-TOTAL</td>
            <td></td>
            <td></td>
            <td align="right">{{ '€ '.$factura->workorders->sum('total') }}</td>
            <td align="right">{{ '€ '.$factura->workorders->sum('discount') }}</td>
          </tr>
          <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td align="right">{{ '€ '.($factura->workorders->sum('total')-$factura->workorders->sum('discount')) }}</td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
