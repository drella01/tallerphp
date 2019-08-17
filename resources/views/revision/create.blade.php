@extends('layouts.app')

@section('content')
@if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
@else
<form class="container-fluid" action={{ route('revision.store') }} method="POST">
@csrf
<div class="container col-md-8">
    <h1>Revisión</h1>
    <table>
    <thead>
      <tr>
      <th>Fecha</th>
      <th>Coche</th>
      <th>Revisión</th>
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
    <td class="table-row {{ $errors->has('car_id') ? 'has-error' : '' }}">
        <select name="revision_id" class="form-control">
          <option value="">Select revision</option>
          @foreach ($revisions as $revision)
              <option value="{{ $revision->id }}">
                {{ $revision->type }}
              </option>
          @endforeach
        </select>
        {!! $errors->first('revision_id', "<span class=help-block>:message</span>") !!}
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
