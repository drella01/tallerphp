@extends('layouts.app')

@section('content')
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@endif
<form class="container-fluid" action={{ route('facturas.update', $factura->id) }} method="POST">
@csrf
@method('PATCH')
<div class="container col-md-8">
    <table>
    <thead>
      <tr>
      <th>Concept</th>
      <th>Units</th>
      <th>Discount</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td class="table-row {{ $errors->has('concept_id') ? 'has-error' : '' }}">
        <select name="concept_id" class="form-control">
          <option value="">Select concept</option>
          @foreach ($concepts as $concept)
              <option value="{{ $concept->id }}">
                {{ $concept->concept }} - {{ $concept->price }}
              </option>
          @endforeach
        </select>
        {!! $errors->first('concept_id', "<span class=help-block>:message</span>") !!}
    </td>
    <td class="table-row">
      <input class="form col-md-4" type="number" name="units" value="{{ 'units' or old('units') }}">
    </td>
    <td>
        <select id="discount" name="discount" class="form-control">
          <option value="">discount</option>
          @for ($discount=0; $discount <= 100; $discount+=5)
            <option value="{{ $discount }}">
              {{ $discount.'%' }}
            </option>
          @endfor
        </select>
    </td>
    <td>
      <div class="btn-group btn-group-sm">
        <input class="btn btn-primary btn-xs" type="submit" value="submit">
      </div>
    </td>
    </tr>
    </tbody>
    </table>
    <select name="workorder_id" class="form-control">
      <option value="">Select order</option>
      @foreach ($workorders as $workorder)
        @if ($workorder->facturas->isEmpty())
          <option value="{{ $workorder->id }}">
            {{ $workorder->concept->concept }} - {{ $workorder->total.' $' }}
          </option>
        @endif
      @endforeach
    </select>
</div>
</form>
<hr>
<div class="container col-md-8">
  <h4> Detalles de la factura {{$factura->id}} del {{$factura->date}}</h4>
  <table class="card-header col-md-6">
  <thead class="card-header" align="center">
    <tr>
      <th>Concept</th>
      <th>Base</th>
      <th>Discount</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($factura->workorders as $workorder)
        <!--div class="form-inline">
          <form action="" method="POST">
              <td><output class="form-control" name="result">
                {{ App\Concept::findOrFail($workorder->concept_id)->concept }}</output>
              </td>
              <td><input type="email" class="form-control" id="" placeholder="Input field"></td>
              <td><input type="submit" class="btn btn-primary" value="edit"></td>
          </form>
        </div-->
      <tr>
        <td align="center">
          {{ App\Concept::findOrFail($workorder->concept_id)->concept }}
        </td>
        <td align="right">{{ '€ '.$workorder->total }}</td>
        <td align="right">{{ '€ '.$workorder->discount }}</td>
        <td align="right">{{ $workorder->total - $workorder->discount }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
