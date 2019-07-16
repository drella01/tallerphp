@extends('layouts.app')

@section('content')
<div class="container col-md-6">
  <div class="card">
    <table class="table">
      <thead class="card-header" align="center">
        <tr>
          <th>Concept</th>
          <th>Units</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($invoice->workorders as $workorder)
          <tr>
            <td align="center">
              {{ App\Concept::findOrFail($workorder->concept_id)->concept }}
            </td>
            <td align="center">
              {{ $workorder->units }}
            </td>
            <td align="center">
              {{ '$ '.App\Concept::findOrFail($workorder->concept_id)->price }}
            </td>
            <td align="right">{{ '$ '.$workorder->total }}</td>
          </tr>
        @endforeach
          <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td align="right">{{ '$ '.$invoice->workorders->sum('total') }}</td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
