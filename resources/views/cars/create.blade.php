@extends('layouts.app')

@section('content')

<form class="container" action={{ route('cars.store') }} method="POST">
  @csrf
  <div class="container">
    <p>
      <label for="registration">
      Registration
      <input class="form-control" type="text" name="registration"
      value="{{ $car->name ?? old('name') }}" required>
      {!! $errors->first('name', '<span class=error>:message</span>') !!}
    </label>
    <label for="client_id">
        Owner
        <select class="form-control" name="client_id">
              <option value="">Select owner</option>
          @foreach ($clients as $client)
              <option name="client_id" value="{{ $client->id }}">{{ $client->name }}</option>
          @endforeach
        </select>
    </label>
    </p>
    <p>
    <label for="brand">
      Brand
      <input class="form-control navbar"type="text" name="brand"
      value="{{ $car->brand ?? old('brand') }}" required>
      {!! $errors->first('brand', '<span class=error>:message</span>') !!}
    </label>
    <label for="model">
      Model
      <input class="form-control navbar"type="text" name="model"
      value="{{ $car->model ?? old('model') }}" required>
      {!! $errors->first('model', '<span class=error>:message</span>') !!}
    </label>
    </p>
    <p>
    <label for="year">
      Year
      <input class="form-control navbar" type="year" name="year"
      value="{{ $car->year ?? old('brand') }}" required>
      {!! $errors->first('year', '<span class=error>:message</span>') !!}
    </label>
    </p>
    <p>
    <label for="kms">
      Kms
      <input class="form-control navbar" type="number" name="kms"
      value="{{ $car->kms ?? old('kms') }}" required>
      {!! $errors->first('year', '<span class=error>:message</span>') !!}
    </label>
    </p>
    <br>
  </div>
  <div class="row justify-content-center">
  <p>
    <input class="btn btn-primary btn-block" type="submit"
    value="{{ $btnText ?? 'Send'}}">
  </p>

  </div>
</form>
@endsection
