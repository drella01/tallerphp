@extends('layouts.app')
@section('content')
<div class="container">
  <h2>{{$client->name}} cars</h2>
  <table class="table">
    <tr>
      <th>Name:</th>
      <td>{{ $client->name }}</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>{{ $client->email }}</td>
    </tr>
    <tr>
      <th>Cars:</th>
      <td>
        @foreach ($client->cars as $car)
        <ul class="list-group">
          <li class="list-group-item">{{ $car->registration }} {{ $car->brand }}-{{ $car->model }}</li>
        </ul>
        @endforeach
      </td>
    </tr>
    <tr>
      <td>
        <div class="btn-group btn-group-sm">
          <a class="btn btn-primary btn-xs"
              href="#">Edit</a>
          @admin
          <form style="display:inline"
                  action="#"
                  method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE')!!}
                  <button class="btn-xs btn-danger" type="submit">Delete</button>
          </form>
          @endadmin
        </div>
      </td>
    </tr>
  </table>
</div>
@endsection
