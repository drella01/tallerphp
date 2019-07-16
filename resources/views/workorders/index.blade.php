@extends('layouts.app')

@section('content')

<div class="container">
  <h2 align="center">Work Orders</h2>
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
                  <th>Date</th>
                  <th>Car</th>
                  <th>Concept</th>
                  <th>Units</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($workOrders as $order)
                <tr>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->car->registration }}</td>
                    <td><a href="{{ route('workorders.edit', $order->id) }}">
                      {{ $order->concept->concept }}</a>
                    </td>
                    <td align="center">{{ $order->units }}</td>
                    <td align="right">{{ ($order->concept->price).' $'  }}</td>
                    <td align="right">
                      {{ ($order->total).' $' }}
                    </td>
                </tr>
                @endforeach
                {{ $workOrders->links() }}
              </tbody>
        </div>
    </div>
</div>
@endsection
