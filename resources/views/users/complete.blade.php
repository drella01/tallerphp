@extends('layouts.app')
@section('content')
<div class="container">
  <h2>{{$usr->name}} cars</h2>
  <table class="table">
    <tr>
      <th>Name:</th>
      <td>{{ $usr->name }}</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>{{ $usr->email }}</td>
    </tr>
    <tr>
    </tr>
  </table>
</div>
@endsection
