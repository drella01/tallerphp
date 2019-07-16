@extends('layouts.app')

@section('content')
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
<form class="container-fluid" action={{ route('facturas.store') }} method="POST">
@csrf
<h1> Factura</h1>
<div class="container col-md-8">
    <table>
    <thead>
      <tr>
      <th>Date</th>
      <th>Car</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>
        <input type="date" name="date" value="">
      </td>
    <td class="table-row {{ $errors->has('car_id') ? 'has-error' : '' }}">
        <select name="car_id" class="form-control">
          <option value="">Select car</option>
          @foreach ($cars as $car)
              <option value="{{ $car->id }}">
                {{ $car->registration }} - {{ $car->model }}
              </option>
          @endforeach
        </select>
        {!! $errors->first('car_id', "<span class=help-block>:message</span>") !!}
    </td>
    <td>
      <div class="btn-group btn-group-sm">
        <input class="btn btn-primary btn-xs" type="submit" value="submit">
      </div>
    </td>
    </tr>
    </tbody>
    </table>
</div>
</form>
@endif
@endsection
