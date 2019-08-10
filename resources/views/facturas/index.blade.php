@extends('layouts.app')

@section('content')

<div class="container">
  <h2 align="center">Facturas</h2>
  @if( session()->has('info') )
    <div class="alert alert-success">{{ session('info') }}</div>
  @endif
    <div class="row justify-content-center">

        <!--div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div-->
        <div class="card">
            <table class="table">
              <thead class="card-header">
                <tr>
                  <th>Fecha</th>
                  <th>Factura</th>
                  <th>Coche</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->date }}</td>
                    <td><a href="{{ route('facturas.show',$factura->id) }}">{{ date('y')*1000 + $factura->id }}</a></td>
                    <td>{{ $factura->car->registration }}</td>
                    <td align="right">
                        {{ '€ '.($factura->workorders->sum('total')-$factura->workorders->sum('discount')) }}
                    </td>
                </tr>
                @endforeach
              </tbody>
        </div>
    </div>
</div>
@endsection
