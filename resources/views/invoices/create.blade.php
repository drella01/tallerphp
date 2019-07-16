@extends('layouts.app')

@section('content')
Aquí crearemos algo
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
<form class="container-fluid" action={{ route('invoices.store') }} method="POST">
@csrf
<div class="container col-md-8">
    <table>
    <thead>
      <tr>
      <th>Date</th>
      <th>Detail</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td class="table-row {{ $errors->has('date') ? 'has-error' : '' }}">
      <label for='date' placeholder="Date">
        <input type="date" name="date" value="date" placeholder="Date">
      </label>
    </td>
    <td class="table-row {{ $errors->has('workOrder_id') ? 'has-error' : '' }}">
        <select name="work_order_id" class="form-control">
          <option value="">Select order</option>
          @foreach ($workorders as $workOrder)
            @if ($workOrder->invoice->isEmpty())
              <option value="{{ $workOrder->id }}">
                {{ $workOrder->concept->concept }} - {{ $workOrder->total.' $' }}
              </option>
            @endif
          @endforeach
        </select>
        {!! $errors->first('workOrder_id', "<span class=help-block>:message</span>") !!}
    </td>
    </tr>
    </tbody>
    </table>
<br>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Add line'}}">
<hr>
</div>
</form>
@endif
@endsection
