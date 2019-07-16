@extends('layouts.app')

@section('content')
Aquí crearemos algo
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@endif
<ul>
  @forelse($invoice->workorders as $workorder)
    <li>{{ App\Concept::findOrFail($workorder->concept_id)->concept }} - {{ $workorder->total }}</li>
  @empty
    <p>No workorders</p>
  @endforelse
</ul>
<form class="container-fluid" action={{ route('invoices.update', $invoice->id) }} method="POST">
@csrf
@method('PATCH')
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
        <output type="text" name="date" value="{{ $invoice->date }}" placeholder="Date">
            {{ $invoice->date }}
        </output>
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
<hr>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Add line'}}">
<a class="btn btn-success" href="{{ route('invoices.show', $invoice->id) }}">
Generate
</a>
<hr>
</div>
</form>
@endsection
